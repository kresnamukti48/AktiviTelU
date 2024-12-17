<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\UKM;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 

        if (auth()->user()->hasRole('Admin')) {  
            $events = Event::all();  
            $eventName = 'Semua Event UKM'; // Atau bisa disesuaikan  
        } else if (auth()->user()->hasRole('Pengurus')) {  
            // Jika user adalah pengurus, tampilkan event hanya untuk UKM yang dimiliki  
            $ukms = auth()->user()->ukms(); // Mendapatkan UKM yang dimiliki oleh user  
            $events = Event::whereIn('ukm_id', $ukms->pluck('id'))->get();  
            $eventName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan';  
        }  

    return view('events.index', compact('events', 'eventName'));
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
        return view('events.create', compact('ukms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'lokasi_event' => 'required',
            'deskripsi_event' => 'required|string',
            'gambar_event' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ukm_id' => 'required|exists:ukms,id',
        ]);

        $imageExtension = $request->gambar_event->extension(); // Ambil ekstensi file  
        $ukm = Ukm::findOrFail($request->input('ukm_id')); // Temukan UKM berdasarkan ukm_id yang dipilih
        $ukmName = $ukm->nama_ukm;
        $imageName = $ukmName . '' . 'Event' . '' . $validatedData['nama_event'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM dan nama kegiatan
        $request->gambar_event->move(public_path('images'), $imageName);


        Event::create([
            'nama_event' => $request->input('nama_event'),
            'tanggal_event' => $request->input('tanggal_event'),
            'lokasi_event' => $request->input('lokasi_event'),
            'deskripsi_event' => $request->input('deskripsi_event'),
            'gambar_event' => 'images/'.$imageName,
            'ukm_id' => $request->input('ukm_id'),
        ]);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::findorFail($id);
        return view('events.show', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $events = Event::findorFail($id);
        if (auth()->user()->hasRole('Admin')) {
            $ukms = Ukm::all();
        } else if (auth()->user()->hasRole('Pengurus')) {
            $ukms = auth()->user()->ukms();
            // Ambil UKM yang dimiliki oleh pengguna yang sedang login  
            $userUkmIds = auth()->user()->ukms()->pluck('id')->toArray();  

            // Cek apakah event yang ingin diedit terkait dengan UKM yang sama  
            if (!in_array($events->ukm_id, $userUkmIds)) {   
                return redirect()->route('events.index')->with('error', 'Anda tidak memiliki izin untuk mengedit event ini.');  
            }
        };      
        return view('events.edit', compact('events', 'ukms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required|date',
            'lokasi_event' => 'required',
            'deskripsi_event' => 'required|string',
            'gambar_event' => 'image|mimes:jpeg,png,jpg|max:2048',
            'ukm_id' => 'required|exists:ukms,id',
        ]);

        $events = Event::findorFail($id);

        // Cek apakah ada logo baru yang diunggah  
        if ($request->hasFile('gambar_event')) {  
            // Hapus logo lama jika ada  
            if ($events->gambar_event) {  
                $oldLogoPath = public_path($events->gambar_event);  
                if (file_exists($oldLogoPath)) {  
                    unlink($oldLogoPath); // Hapus file logo lama  
                }  
            } 

            $imageExtension = $request->gambar_event->extension();  
            $imageName = $validatedData['nama_event'] . '.' . $imageExtension; // Ganti nama file dengan nama UKM  
            $request->gambar_event->move(public_path('images'), $imageName); // Mindahin file ke folder images  

            // Update data UKM dengan logo baru  
            $validatedData['gambar_event'] = 'images/' . $imageName; // Simpan path logo baru  
        } else {  
            // Jika tidak ada logo baru, tetap gunakan logo lama  
            $validatedData['gambar_event'] = $events->gambar_event;  
        }  
        $events->update($validatedData);
        

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan UKM berdasarkan ID  
        $events = Event::findOrFail($id);  
    
        // Hapus file logo jika ada  
        if ($events->gambar_event) {  
            $logoPath = public_path($events->gambar_event);  
            if (file_exists($logoPath)) {  
                unlink($logoPath); // Hapus file logo dari sistem file  
            }  
        }  
    
        // Hapus UKM dari database  
        $events->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus');
    }
}