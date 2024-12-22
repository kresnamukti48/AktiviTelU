<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  
use App\Models\Ticket; 
use App\Models\Event; 
use App\Exports\TicketExport;
use Maatwebsite\Excel\Facades\Excel;  

class TicketController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     */  
    public function index()  
    {  
        // Jika role user adalah 'admin', maka tampilkan semua tiket  
        if (auth()->user()->hasRole('Admin')) {  
            $tickets = Ticket::all();
            $ukmName = 'Semua Ticket Event';   
        } else if (auth()->user()->hasRole('Pengurus')) {  
            // Jika user adalah pengurus, tampilkan tiket hanya untuk UKM yang dimiliki  
            $ukms = auth()->user()->ukms(); // Mendapatkan UKM yang dimiliki oleh user  
            $eventIds = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id'); // Mendapatkan ID event berdasarkan UKM  
            $tickets = Ticket::whereIn('event_id', $eventIds)->get(); // Mendapatkan tiket berdasarkan ID event
            $ukmName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan';  
        }  

        return view('tickets.index', compact('tickets', 'ukmName'));  
    }  

    /**  
     * Show the form for creating a new resource.  
     */  
    public function create()  
    {  
        if (auth()->user()->hasRole('Admin')) {  
            $events = Event::all();  
        } else if (auth()->user()->hasRole('Pengurus')) {  
            // Ambil UKM yang dimiliki oleh pengguna  
            $ukms = auth()->user()->ukms();  
            // Ambil event yang terkait dengan UKM tersebut  
            $eventIds = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id');  
            $events = Event::whereIn('id', $eventIds)->get(); // Mendapatkan event berdasarkan ID  
        }  

        return view('tickets.create', compact('events'));  
    }  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id|unique:tickets,event_id',
            'harga' => 'required|numeric',
            'stok_tiket' => 'required|numeric',
        ]);

        $validatedData['status'] = $validatedData['stok_tiket'] > 0 ? 'tersedia' : 'habis';

        Ticket::create($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil ditambahkan');
    }

    /**  
     * Display the specified resource.  
     */  
    public function show(string $id)  
    {  
        $ticket = Ticket::findOrFail($id);  
        return view('tickets.show', compact('ticket'));  
    }  

    /**  
     * Show the form for editing the specified resource.  
     */  
    public function edit(string $id)  
    {  
        $ticket = Ticket::findOrFail($id); 
        if (auth()->user()->hasRole('Admin')) {  
            $events = Event::all();  
        } else if (auth()->user()->hasRole('Pengurus')) {  
            // Ambil UKM yang dimiliki oleh pengguna  
            $ukms = auth()->user()->ukms();  
            // Ambil event yang terkait dengan UKM tersebut  
            $eventIds = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id');
            // Cek apakah event tiket termasuk dalam event yang dimiliki oleh UKM pengguna  
            if (!in_array($ticket->event_id, $eventIds->toArray())) {  
                return redirect()->route('tickets.index')->with('error', 'Anda tidak memiliki izin untuk mengedit tiket ini.');  
            }    
            $events = Event::whereIn('id', $eventIds)->get(); // Mendapatkan event berdasarkan ID  
        }  
        return view('tickets.edit', compact('ticket', 'events'));  
    }  

    /**  
     * Update the specified resource in storage.  
     */  
    public function update(Request $request, string $id)  
    {  
        $validatedData = $request->validate([  
            'event_id' => 'required|exists:events,id',  
            'harga' => 'required|numeric',  
            'stok_tiket' => 'required|numeric',   
        ]);

        $validatedData['status'] = $validatedData['stok_tiket'] > 0 ? 'tersedia' : 'habis';  

        $ticket = Ticket::findOrFail($id);  
        $ticket->update($validatedData);  

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diubah');  
    }  

    /**  
     * Remove the specified resource from storage.  
     */  
    public function destroy(string $id)  
    {  
        Ticket::findOrFail($id)->delete();  

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus');  
    }  

    public function export(Request $request)  
    {  
        if (auth()->user()->hasRole('Admin')) {
            $ticket = Ticket::all();
        } else if (auth()->user()->hasRole('Pengurus')) {
            $ukms = auth()->user()->ukms();
            $eventIds = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id');
            $ticket = Ticket::whereIn('event_id', $eventIds)->get();
        }
    
        return Excel::download(new TicketExport($ticket), 'tickets.xlsx');
    }
}