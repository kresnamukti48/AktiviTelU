<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\KegiatanUkm;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukms = Ukm::withCount(['members', 'kegiatan'])->get();   
        $ukmcount = Ukm::count();
        $kegiatan = KegiatanUkm::count();  
        $event = Event::count();
        $ukmCounts = [  
            'sosial' => Ukm::where('kategori_ukm', 'sosial')->count(),  
            'kesenian' => Ukm::where('kategori_ukm', 'kesenian')->count(),  
            'penalaran' => Ukm::where('kategori_ukm', 'penalaran')->count(),  
            'olahraga' => Ukm::where('kategori_ukm', 'olahraga')->count(),  
            'kerohanian' => Ukm::where('kategori_ukm', 'kerohanian')->count(),  
            ];  
        return view('welcome', compact('ukms', 'ukmCounts', 'ukmcount', 'kegiatan', 'event'));  
    }

    public function ukm(Ukm $ukm)  
    {  
        // Muat data UKM dengan jumlah anggota, kegiatan, dan dosen  
        $ukm->loadCount(['members', 'kegiatan', 'dosens']); // Pastikan ada relasi 'dosen' dalam model Ukm  
        $hasJoinedUkm = null;
        // Ambil ketua dan wakil ketua  
        $ketua = $ukm->members()->where('role_member', 'ketua')->with('user')->first();  
        $wakilKetua = $ukm->members()->where('role_member', 'wakil ketua')->with('user')->first(); 
        $kegiatan = $ukm->kegiatan()->take(5)->get();
        $dosen = $ukm->dosens()->with('user')->first();
    
        // Ambil semua UKM  
        $ukms = Ukm::withCount(['members', 'kegiatan'])->get(); 
        // Cek apakah pengguna sudah bergabung dengan UKM  
        if (!Auth::check()) { 
            $hasJoinedUkm = Member::where('user_id', Auth::id())  
                ->where('ukm_id', $ukm->id)  
                ->exists();  
    
        }
    
        return view('user.ukm', [  
            'ukm' => $ukm,  
            'hasJoinedUkm' => $hasJoinedUkm,  
            'ukms' => $ukms,  
            'ketua' => $ketua,  
            'wakilKetua' => $wakilKetua,  
            'dosen' => $dosen,
            'kegiatan' => $kegiatan,
        ]);  
    }
    
    public function event()  
    {  
    
        // Ambil semua event beserta info stok tiketnya  
        $events = Event::with(['tiket' => function($query) {  
            $query->select('event_id', 'stok_tiket', 'status', 'id'); // Ambil stok tiket dan status  
        }])  
        ->orderByDesc('created_at')  
        ->get();  
    
        return view('user.event', [  
            'events' => $events,  
        ]);  
    } 

}
