<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Role;
use App\Models\Ukm;
use App\Models\Dosen;
use App\Models\KegiatanUkm;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {   

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->hasRole(Role::ROLE_ADMIN)) {
            $users = User::count();
            $dosens = Dosen::count();
            $ukms = Ukm::count();
            $member = Member::count();
            $kegiatan = KegiatanUkm::count();
            $event = Event::count();
            $ticket = Ticket::count();
            $checkout = Checkout::count();
            $total = Checkout::where('status', 'success')->sum('total_harga');
            $widget = [
                'users' => $users,
                'dosens' => $dosens,
                'ukms' => $ukms,
                'member' => $member,
                'kegiatan' => $kegiatan,
                'event' => $event,
                'ticket' => $ticket,
                'checkout' => $checkout,
                'total' => $total,
            ];
            return view('dashboard_admin', compact('widget'));
        } else if ($user->hasRole(Role::ROLE_PENGURUS)){
            $ukms = auth()->user()->ukms();
            $members = Member::whereIn('ukm_id', $ukms->pluck('id'))->count();
            $kegiatan = KegiatanUkm::whereIn('ukm_id', $ukms->pluck('id'))->count();
            $event = Event::whereIn('ukm_id', $ukms->pluck('id'))->count();
            $eventIds = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id'); // Mendapatkan ID event berdasarkan UKM  
            $ticket = Ticket::whereIn('event_id', $eventIds)->count();
            $checkout = Checkout::whereHas('tiket', function($query) use ($eventIds) {  
                $query->whereIn('event_id', $eventIds);  
            })->count();
            $total = Checkout::where('status', 'success')->whereHas('tiket', function($query) use ($eventIds) {  
                $query->whereIn('event_id', $eventIds);  
            })->sum('total_harga');
            $widget = [
                'members' => $members,
                'kegiatan' => $kegiatan,
                'event' => $event,
                'ticket' => $ticket,
                'checkout' => $checkout,
                'total' => $total,
            ];
            return view('dashboard_pengurus', compact('widget'));

        } else if ($user->hasRole(Role::ROLE_MEMBER)) {  
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

        
    }


    public function join(Request $request, Ukm $ukm)
    {
        $data = $request->validate([
            'nim' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|numeric',
        ]);

        try {
            $data['user_id'] = Auth::id();
            $data['ukm_id'] = $ukm->id;
            $data['role_member'] = 'anggota';

            Member::create($data);
        } catch (\Throwable $th) {
            return back()
                ->withInput()
                ->with('error', [
                    'message' => 'Gagal bergabung dengan UKM: ' . $th->getMessage(),
                ]);
        }

        return back()
            ->with('success', [
                'message' => 'Berhasil bergabung dengan UKM',
            ]);
    }

    public function showUkmByUser()  
    {  
        
        $ukms = auth()->user()->ukm;
        return view('user.myukm', compact('ukms'));  
    }

    public function showTicketByUser()  
    {  
        $checkouts = auth()->user()->checkouts()  
        ->where('status', 'success') 
        ->get();
        return view('user.myticket', compact('checkouts'));  
    }
}
