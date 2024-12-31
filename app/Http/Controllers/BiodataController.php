<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Checkout;   
use App\Models\Ticket;
use App\Models\Event;
use App\Models\Member;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Role;

use App\Exports\UkmExport;

class BiodataController extends Controller
{



    public function ticket()
    {


        $user = auth()->user();  

        $checkouts = Checkout::all();  
        $checkoutName = 'Semua Transaksi'; // Atau bisa disesuaikan  
 
        // Jika user adalah pengurus, tampilkan event hanya untuk UKM yang dimiliki  
        $ukms = auth()->user()->ukms(); // Mendapatkan UKM yang dimiliki oleh user  
        $events = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id');
        $checkouts = Checkout::whereHas('tiket', function($query) use ($events) {  
            $query->whereIn('event_id', $events);  
        })->get(); 
        $checkoutName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan'; 
        

            $members = Member::all();
            $ukmName = 'Semua Member UKM';

            // Jika user adalah pengurus, tampilkan event hanya untuk UKM yang dimiliki
            $ukms = auth()->user()->ukms(); // Mendapatkan UKM yang dimiliki oleh user
            $members = Member::whereIn('ukm_id', $ukms->pluck('id'))->get();
            $ukmName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan';

    
    return view('user.biodata', compact('checkouts', 'checkoutName'));  
    }
        
}
