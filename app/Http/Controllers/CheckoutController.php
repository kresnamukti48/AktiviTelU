<?php  

namespace App\Http\Controllers;  

use Illuminate\Http\Request;  
use Midtrans\Config;  
use Midtrans\Snap;  
use App\Models\Checkout;   
use App\Models\Ticket;
use App\Models\Event;
use Midtrans\Notification;
use App\Exports\TransaksiExport;  
use Maatwebsite\Excel\Facades\Excel;  

class CheckoutController extends Controller  
{  
    public function index()  
    {  
        if (auth()->user()->hasRole('Admin')) {  
            $checkouts = Checkout::all();  
            $checkoutName = 'Semua Transaksi'; // Atau bisa disesuaikan  
        } else if (auth()->user()->hasRole('Pengurus')) {  
            // Jika user adalah pengurus, tampilkan event hanya untuk UKM yang dimiliki  
            $ukms = auth()->user()->ukms(); // Mendapatkan UKM yang dimiliki oleh user  
            $events = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id');
            $checkouts = Checkout::whereHas('tiket', function($query) use ($events) {  
                $query->whereIn('event_id', $events);  
            })->get(); 
            $checkoutName = $ukms->isNotEmpty() ? $ukms->first()->nama_ukm : 'UKM Tidak Ditemukan';  
        }
        return view('checkouts.index', compact('checkouts', 'checkoutName'));  

    }
    

    
    public function processCheckout(Request $request)  
    {
        // Validasi data yang diperlukan  
        $validatedData = $request->validate([  
            'ticket_id' => 'required|exists:tickets,id', // Pastikan nama tabel dan kolom sesuai  
            'jumlah_tiket' => 'required|integer|min:1',  
        ]);  

        // Ambil data tiket  
        $ticket = Ticket::find($validatedData['ticket_id']);  
            // Validasi jumlah tiket agar tidak melebihi stok  
        if ($validatedData['jumlah_tiket'] > $ticket->stok_tiket) {  
            return redirect()->back()->with('error', 'Jumlah tiket yang anda inputkan melebihi Stok yang tersedia');  
        }  
        $totalHarga = $ticket->harga * $validatedData['jumlah_tiket'];  



        // Simpan data checkout ke database  
        $checkout = Checkout::create([
            'id' => uniqid(),  
            'tiket_id' => $ticket->id,  
            'user_id' => auth()->id(),  
            'jumlah_tiket' => $validatedData['jumlah_tiket'],  
            'total_harga' => $totalHarga,  
            'tanggal_checkout' => now(),  
            'status' => 'pending',  
        ]);  

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');


        // Buat transaksi  
        $transactionDetails = [  
            'order_id' => $checkout->id, // Gunakan checkout_id sebagai order_id  
            'gross_amount' => $totalHarga,  
        ];  

        $itemDetails = [  
            [  
                'id' => $ticket->id,  
                'price' => $ticket->harga,  
                'quantity' => $validatedData['jumlah_tiket'],  
                'name' => $ticket->event->nama_event,  
            ],  
        ];  

        $transactionData = [  
            'transaction_details' => $transactionDetails,  
            'item_details' => $itemDetails,  
            'customer_details' => [  
                'first_name' => auth()->user()->name,  
                'email' => auth()->user()->email,  
            ],  
        ];  

        // Dapatkan URL pembayaran dari Midtrans  
        $snapToken = Snap::getSnapToken($transactionData);  

        return view('checkout_payment', compact('snapToken'));  
    }  

    public function handleNotification(Request $request)  
{  

    
    // Ambil data notifikasi dari Midtrans  
    $payload = $request->getContent();
    $notification = json_decode($payload);
    $transaction_status = $notification->transaction_status;
    $payment_type = $notification->payment_type;
    $orderId = $notification->order_id;
    $fraud = $notification->fraud_status;

    $data = Checkout::where('id', $orderId)->first();




    // Cek status transaksi  
    if ($transaction_status == 'capture') {
        if ($payment_type == 'credit_card') {
            if ($fraud == 'challenge') {
                $data->update([
                    'status' => 'pending'
                ]);
            } else {
                $data->update([
                    'status' => 'success'
                ]);
            }
        }
    } elseif ($transaction_status == 'settlement') {
        $data->update([
            'status' => 'success'
        ]);
    } elseif ($transaction_status == 'pending') {
        $data->update([
            'status' => 'pending'
        ]);
    } elseif ($transaction_status == 'deny') {
        $data->update([
            'status' => 'failed'
        ]);
    } elseif ($transaction_status == 'expire') {
        $data->update([
            'status' => 'expired'
        ]);
    } elseif ($transaction_status == 'cancel') {
        $data->update([
            'status' => 'canceled'
        ]);
    }

        // Setelah status berhasil diupdate, kurangi stok tiket  
        if ($data->status == 'success') {  
            $ticket = Ticket::find($data->tiket_id);  // Ambil data tiket berdasarkan tiket_id  
            $stokTiketAwal = $ticket->stok_tiket; // Simpan stok awal  
            $ticketsPurchased = $data->jumlah_tiket;  // Jumlah tiket yang dibeli  
            // Cek jika stok cukup  
            if ($stokTiketAwal >= $ticketsPurchased) {  
                $ticket->stok_tiket -= $ticketsPurchased; // Kurangi stok tiket  
                // Jika stok tiket menjadi 0, ubah status tiket ke 'habis'  
                if ($ticket->stok_tiket == 0) {  
                    $ticket->status = 'habis';  
                }  
                $ticket->save(); // Simpan perubahan  
                }
            } 
        }
        public function export(Request $request)  
    {  
        if (auth()->user()->hasRole('Admin')) {
            $transaksi = Checkout::where('status', 'success')->get();
        } else if (auth()->user()->hasRole('Pengurus')) {
            $ukms = auth()->user()->ukms();
            $events = Event::whereIn('ukm_id', $ukms->pluck('id'))->pluck('id');
            $transaksi = Checkout::whereHas('tiket', function($query) use ($events) {  
                $query->whereIn('event_id', $events);  
            })->where('status', 'success')->get(); 
        }
    
        return Excel::download(new TransaksiExport($transaksi), 'transaksis.xlsx');
    }  
}
