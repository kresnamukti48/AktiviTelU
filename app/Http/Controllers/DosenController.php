<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Ukm;
use App\Exports\DosenExport;
use Maatwebsite\Excel\Facades\Excel;  

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()  
    {  
        // Ambil pengguna yang tidak memiliki role 'ROLE_MEMBER'  
        $users = User::whereDoesntHave('roles', function($query) {  
            $query->whereIn('name', ['Member', 'Admin', 'Pengurus']);
        })->get();  
    
        $ukms = Ukm::all();  
        return view('dosens.create', compact('users', 'ukms'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nip' => 'required|numeric',
            'fakultas' => 'required|string',
            'ukm_id' => 'required|exists:ukms,id',
        ]);
        $dosen = User::findOrFail($validatedData['user_id']);
        $dosen->assignRole('Pengurus');

        Dosen::create($validatedData);
        


        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosens = Dosen::findorFail($id);
        return view('dosens.show', compact('dosens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosens = Dosen::findorFail($id);
        $ukms = Ukm::all();
        return view('dosens.edit', compact('dosens', 'ukms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required|numeric',
            'fakultas' => 'required|string',
            'ukm_id' => 'required|exists:ukms,id',
        ]);

        Dosen::findorFail($id)->update($validatedData);

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);  

        $dosen->user->roles()->detach(); // Menghapus semua role dari pengguna  
        // Hapus dosen  
        $dosen->delete();  

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus');
    }
    public function export(Request $request)  
    {  
        $dosen = Dosen::all();
    
        return Excel::download(new DosenExport($dosen), 'dosens.xlsx');
    }
}