<?php  

namespace App\Http\Controllers;  

use App\Models\Ukm;  
use Illuminate\Http\Request;
use App\Exports\UkmExport;
use App\Models\Member;
use Maatwebsite\Excel\Facades\Excel; 

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

    public function listByCategory($kategori)  
    {  
        // Ambil UKM berdasarkan kategori  
        $ukms = UKM::where('kategori_ukm', $kategori)->get(); // Pastikan kolom kategori sesuai  
        return view('user.ukmlist', compact('ukms', 'kategori'));  
    }  

    //get by id user yang sedang login
    public function showByUser()  
    {  
        $ukms = auth()->user()->ukm;
        return view('user.myukm', compact('ukms'));  
    }

    public function search(Request $request)  
    {  
        // Validasi input nama  
        $request->validate([  
            'name' => 'required|string|max:255',  
        ]);  

        // Ambil nama yang dicari  
        $name = $request->input('name');  

        // Mencari UKM berdasarkan nama yang diberikan  
        $ukm = Ukm::where('nama_ukm', 'LIKE', "%{$name}%")->first(); // Menggunakan LIKE untuk pencarian yang flexible  

        // Periksa jika UKM ditemukan  
        if ($ukm) {  
            // Jika ditemukan, redirect ke halaman detail UKM  
            return redirect()->route('home.ukm', ['ukm' => $ukm->id]); // Gantilah 'ukm.detail' dengan nama route detail yang sesuai  
        }  

        // Jika tidak ditemukan, kembali dengan pesan error  
        return redirect()->back()->with('error', 'UKM tidak ditemukan.');  
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
            'kategori_ukm' => 'required|in:kesenian,sosial,penalaran,olahraga,kerohanian', // Memvalidasi kategori  
            'instagram_ukm' => 'required|string', // Validasi kolom instagram_ukm  
            'email_ukm' => 'required|email', // Validasi kolom email_ukm  
        ]);  

        $imageExtension = $request->logo_ukm->extension(); // Ambil ekstensi file  
        $imageName = $validatedData['nama_ukm'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM  
        $request->logo_ukm->move(public_path('images'), $imageName);  

        Ukm::create([  
            'nama_ukm' => $request->input('nama_ukm'),  
            'deskripsi_ukm' => $request->input('deskripsi_ukm'),  
            'kategori_ukm' => $request->input('kategori_ukm'), // Menyimpan kategori  
            'instagram_ukm' => $request->input('instagram_ukm'), // Menyimpan instagram  
            'email_ukm' => $request->input('email_ukm'), // Menyimpan email_ukm  
            'logo_ukm' => 'images/'.$imageName, // Menyimpan path logo  
        ]);  

        return redirect()->route('ukms.index')->with('success', 'UKM berhasil ditambahkan');  
    }  

    /**  
     * Display the specified resource.  
     */  
    public function show(string $id)  
    {  
        $ukms = Ukm::findOrFail($id);  
        return view('ukms.show', compact('ukms'));  
    }  

    /**  
     * Show the form for editing the specified resource.  
     */  
    public function edit(string $id)  
    {  
        $ukm = Ukm::findOrFail($id);  
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
            'kategori_ukm' => 'required|in:kesenian,sosial,penalaran,olahraga,kerohanian', // Memvalidasi kategori_ukm  
            'instagram_ukm' => 'required|string', // Validasi kolom instagram  
            'email_ukm' => 'required|email', // Validasi kolom email  
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
            $request->logo_ukm->move(public_path('images'), $imageName); // Pindahkan file ke folder images  
    
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
        $ukm = Ukm::findOrFail($id);  
    
        // Hapus file logo jika ada  
        if ($ukm->logo_ukm) {  
            $logoPath = public_path($ukm->logo_ukm);  
            if (file_exists($logoPath)) {  
                unlink($logoPath); // Hapus file logo dari sistem file  
            }  
        }  
    
        // Hapus UKM dari database  
        $ukm->delete();  
    
        return redirect()->route('ukms.index')->with('success', 'UKM berhasil dihapus');
    }

    public function export(Request $request)  
    {  
        $ukm = Ukm::all();
        return Excel::download(new UkmExport($ukm), 'ukms.xlsx');
    }
}
