<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukms = Ukm::all();
        return view('ukms.index', compact('ukms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ukms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ukm' => 'required',
            'deskripsi_ukm' => 'required',
            'logo_ukm' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageExtension = $request->logo_ukm->extension(); // Ambil ekstensi file  
        $imageName = $validatedData['nama_ukm'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM  
        $request->logo_ukm->move(public_path('images'), $imageName);

        Ukm::create([
            'nama_ukm' => $request->input('nama_ukm'),
            'deskripsi_ukm' => $request->input('deskripsi_ukm'),
            'logo_ukm' => 'images/'.$imageName,
        ]);
        return redirect()->route('ukms.index')->with('success', 'UKM berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ukms = Ukm::findorFail($id);
        return view('ukms.show', compact('ukms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ukm = Ukm::findorFail($id);
        return view('ukms.edit', compact('ukm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  
    {  
        // Validasi input  
        $validatedData = $request->validate([  
            'nama_ukm' => 'required',  
            'deskripsi_ukm' => 'required',  
            'logo_ukm' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Logo baru bersifat opsional  
        ]);  

        // Temukan UKM berdasarkan ID  
        $ukm = Ukm::findOrFail($id);  

        // Cek apakah ada logo baru yang diunggah  
        if ($request->hasFile('logo_ukm')) {  
            // Hapus logo lama jika ada  
            if ($ukm->logo_ukm) {  
                $oldLogoPath = public_path($ukm->logo_ukm);  
                if (file_exists($oldLogoPath)) {  
                    unlink($oldLogoPath); // Hapus file logo lama  
                }  
            }  

            // Ambil ekstensi file logo baru  
            $imageExtension = $request->logo_ukm->extension();  
            $imageName = $validatedData['nama_ukm'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM  
            $request->logo_ukm->move(public_path('images'), $imageName); // Mindahin file ke folder images  

            // Update data UKM dengan logo baru  
            $validatedData['logo_ukm'] = 'images/' . $imageName; // Simpan path logo baru  
        } else {  
            // Jika tidak ada logo baru, tetap gunakan logo lama  
            $validatedData['logo_ukm'] = $ukm->logo_ukm;  
        }  

        // Update data UKM  
        $ukm->update($validatedData);  

        return redirect()->route('ukms.index')->with('success', 'UKM berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  
    {  
        // Temukan UKM berdasarkan ID  
        $ukms = Ukm::findOrFail($id);  
    
        // Hapus file logo jika ada  
        if ($ukms->logo_ukm) {  
            $logoPath = public_path($ukms->logo_ukm);  
            if (file_exists($logoPath)) {  
                unlink($logoPath); // Hapus file logo dari sistem file  
            }  
        }  
    
        // Hapus UKM dari database  
        $ukms->delete();  
    
        return redirect()->route('ukms.index')->with('success', 'UKM berhasil dihapus');
    }
}
