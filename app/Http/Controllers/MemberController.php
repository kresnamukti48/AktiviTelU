<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Models\UKM;
use App\Models\Role;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $members = Member::all();
            $ukmName = 'Semua Member UKM';
        } else if (auth()->user()->hasRole('Pengurus|Dosen')) {
            // Jika user adalah pengurus, tampilkan event hanya untuk UKM yang dimiliki
            $ukms = auth()->user()->ukms; // Mendapatkan UKM yang dimiliki oleh user
            $members = Member::whereIn('ukm_id', $ukms->pluck('id'))->get();
            $ukmName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan';
        }

        return view('members.index', compact('members', 'ukmName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', '!=', auth()->id())->whereDoesntHave('roles', function($query) {
            $query->whereIn('name', ['Admin', 'Pengurus']);
        })->get();
        if (auth()->user()->hasRole('Admin')) {
            $ukm = Ukm::all();
            
        } else if (auth()->user()->hasRole('Pengurus')) {
            $ukm = auth()->user()->ukms;
        }
        return view('members.create', compact('ukm', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'user_id' => 'required|exists:users,id',
            'nim' => 'required|numeric',
            'jurusan' => 'required|string',
            'angkatan' => 'required',
            'ukm_id' => 'required|exists:ukms,id',
            'role_member' => 'required|in:ketua,wakil ketua,anggota',
        ]);

        // Mengecek apakah sudah ada ketua di UKM
        if ($validatedData['role_member'] === 'ketua' && Member::where('ukm_id', $validatedData['ukm_id'])->where('role_member', 'ketua')->exists()) {
            return redirect()->back()->with('error', 'Sudah ada ketua di UKM ini');
        }

        // Mengecek apakah sudah ada wakil ketua di UKM
        if ($validatedData['role_member'] === 'wakil ketua' && Member::where('ukm_id', $validatedData['ukm_id'])->where('role_member', 'wakil ketua')->exists()) {
            return redirect()->back()->with('error', 'Sudah ada wakil ketua di UKM ini');
        }

        $user = User::findOrFail($validatedData['user_id']);

        if ($validatedData['role_member'] === 'ketua' || $validatedData['role_member'] === 'wakil ketua') {
            $user->syncRoles(Role::ROLE_PENGURUS);
        }

        Member::create($validatedData);

        return redirect()->route('members.index')->with('success', 'Member UKM berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findorFail($id);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->hasRole('Admin')) {
            $member = Member::findOrFail($id);
            $user = User::all();
            $ukm = Ukm::all();
            return view('members.edit', compact('ukm', 'user', 'member'));
        } else if (auth()->user()->hasRole('Pengurus')) {
            $member = Member::findOrFail($id);

            // Ambil UKM yang dimiliki oleh pengguna yang sedang login  
            $userUkmIds = auth()->user()->ukms->pluck('id')->toArray();  

            // Cek apakah member yang ingin diedit terkait dengan UKM yang sama  
            if (!in_array($member->ukm_id, $userUkmIds)) {   
                return redirect()->route('members.index')->with('error', 'Anda tidak memiliki izin untuk mengedit member ini.');  
            }
            
            return view('members.edit', compact('member'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  
    {  
        $validatedData = $request->validate([  
            'nim' => 'required|numeric',  
            'jurusan' => 'required|string',  
            'angkatan' => 'required',  
            'role_member' => 'required|in:ketua,wakil ketua,anggota',  
        ]);  
    
        $member = Member::findOrFail($id);  
    
        // Cek jika role_member diubah menjadi ketua atau wakil ketua  
        if (in_array($validatedData['role_member'], ['ketua', 'wakil ketua'])) {  
            // Cek apakah sudah ada ketua atau wakil ketua di UKM ini  
            if ($validatedData['role_member'] === 'ketua' && Member::where('ukm_id', $member->ukm_id)->where('role_member', 'ketua')->exists() && $member->role_member !== 'ketua') {  
                return redirect()->back()->with('error', 'Sudah ada ketua di UKM ini');  
            }  
    
            if ($validatedData['role_member'] === 'wakil ketua' && Member::where('ukm_id', $member->ukm_id)->where('role_member', 'wakil ketua')->exists() && $member->role_member !== 'wakil ketua') {  
                return redirect()->back()->with('error', 'Sudah ada wakil ketua di UKM ini');  
            }  
    
            // Jika tidak ada ketua atau wakil ketua, update role menjadi pengurus  
            $member->user->syncRoles(Role::ROLE_PENGURUS);  
        } else {  
            // Jika role diubah menjadi anggota, hapus role pengurus  
            $member->user->roles()->detach();  
        }  
    
        // Update data member  
        $member->update($validatedData);  
    
        return redirect()->route('members.index')->with('success', 'Member UKM berhasil diubah');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);  

        $member->user->roles()->detach(); // Menghapus semua role dari pengguna  
        // Hapus member  
        $member->delete();  

        return redirect()->route('members.index')->with('success', 'Member UKM berhasil dihapus');
    }
}
