<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Role;
use App\Models\Ukm;
use App\Models\User;
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
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Menampilkan halaman member
        if ($user->hasRole(Role::ROLE_MEMBER)) {
            return view('user.home', [
                'ukms' => Ukm::all(),
            ]);
        }

        return view('home', compact('widget'));
    }

    public function ukm(Ukm $ukm)
    {
        $hasJoinedUkm = Member::where('user_id', Auth::id())
            ->where('ukm_id', $ukm->id)
            ->exists();

        return view('user.ukm', [
            'ukm' => $ukm,
            'hasJoinedUkm' => $hasJoinedUkm,
            'ukms' => Ukm::all(),
        ]);
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
