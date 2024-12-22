<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanUkm;
use App\Models\Ukm;

class KegiatanUkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  
    {  
    
        if (auth()->user()->hasRole('Admin')) {  
            $kegiatan = KegiatanUkm::all();  
            $ukmName = 'Semua UKM'; // Atau bisa disesuaikan  
        } else if (auth()->user()->hasRole('Pengurus')) {  
            // Jika user adalah pengurus, tampilkan event hanya untuk UKM yang dimiliki  
            $ukms = auth()->user()->ukms(); // Mendapatkan UKM yang dimiliki oleh user  
            $kegiatan = KegiatanUkm::whereIn('ukm_id', $ukms->pluck('id'))->get();  
            $ukmName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan';  
        }   
    
        return view('kegiatans.index', compact('kegiatan', 'ukmName'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('Admin')) {
            $ukms = Ukm::all();
        } else if (auth()->user()->hasRole('Pengurus')) {
            $ukms = auth()->user()->ukms();
        }
        return view('kegiatans.create', compact('ukms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required|string',
            'gambar_kegiatan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ukm_id' => 'required|exists:ukms,id',
        ]);

        $imageExtension = $request->gambar_kegiatan->extension(); // Ambil ekstensi file  
        $ukm = Ukm::findOrFail($request->input('ukm_id')); // Temukan UKM berdasarkan ukm_id yang dipilih
        $ukmName = $ukm->nama_ukm;
        $imageName = $ukmName . '_' . 'Kegiatan' . '_' . $validatedData['nama_kegiatan'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM dan nama kegiatan
        $request->gambar_kegiatan->move(public_path('images'), $imageName);


        KegiatanUkm::create([
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal_kegiatan' => $request->input('tanggal_kegiatan'),
            'lokasi_kegiatan' => $request->input('lokasi_kegiatan'),
            'deskripsi_kegiatan' => $request->input('deskripsi_kegiatan'),
            'gambar_kegiatan' => 'images/'.$imageName, // Menyimpan path gambar jika ada
            'ukm_id' => $request->input('ukm_id'),  
            
        ]);
        

        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan UKM berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = KegiatanUkm::findorFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = KegiatanUkm::findorFail($id);
        if (auth()->user()->hasRole('Admin')) {
            $ukms = Ukm::all();
        } else if (auth()->user()->hasRole('Pengurus')) {
            $ukms = auth()->user()->ukms();
            // Ambil UKM yang dimiliki oleh pengguna yang sedang login  
            $userUkmIds = auth()->user()->ukms()->pluck('id')->toArray();  

            // Cek apakah event yang ingin diedit terkait dengan UKM yang sama  
            if (!in_array($kegiatan->ukm_id, $userUkmIds)) {   
                return redirect()->route('kegiatans.index')->with('error', 'Anda tidak memiliki izin untuk mengedit kegiatan ini.');  
            }
        };      
        return view('kegiatans.edit', compact('kegiatan', 'ukms'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|string',
            'tanggal_kegiatan' => 'required|date',
            'lokasi_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required|string',
            'gambar_kegiatan' => 'image|mimes:jpeg,png,jpg|max:2048',
            'ukm_id' => 'required|exists:ukms,id',
        ]);

        $kegiatans = KegiatanUkm::findorFail($id);

        // Cek apakah ada logo baru yang diunggah  
        if ($request->hasFile('gambar_kegiatan')) {  
            // Hapus logo lama jika ada  
            if ($kegiatans->gambar_kegiatan) {  
                $oldLogoPath = public_path($kegiatans->gambar_kegiatan);  
                if (file_exists($oldLogoPath)) {  
                    unlink($oldLogoPath); // Hapus file logo lama  
                }  
            } 

            $imageExtension = $request->gambar_kegiatan->extension();
            $ukm = Ukm::findOrFail($request->input('ukm_id')); // Temukan UKM berdasarkan ukm_id yang dipilih
            $ukmName = $ukm->nama_ukm;  
            $imageName = $ukmName . '_' . 'Kegiatan' . '_' . $validatedData['nama_kegiatan'] . '.' . $imageExtension;
            $request->gambar_kegiatan->move(public_path('images'), $imageName); // Mindahin file ke folder images  

            // Update data UKM dengan logo baru  
            $validatedData['gambar_kegiatan'] = 'images/' . $imageName; // Simpan path logo baru  
        } else {  
            // Jika tidak ada logo baru, tetap gunakan logo lama  
            $validatedData['gambar_kegiatan'] = $kegiatans->gambar_event;  
        }  
        $kegiatans->update($validatedData);

        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan UKM berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kegiatans = KegiatanUkm::findOrFail($id);  
    
        // Hapus file logo jika ada  
        if ($kegiatans->gambar_kegiatan) {  
            $logoPath = public_path($kegiatans->gambar_kegiatan);  
            if (file_exists($logoPath)) {  
                unlink($logoPath); // Hapus file logo dari sistem file  
            }  
        }  
    
        // Hapus UKM dari database  
        $kegiatans->delete();  

        return redirect()->route('kegiatans.index')->with('success', 'Kegiatan UKM berhasil dihapus');
    }
}