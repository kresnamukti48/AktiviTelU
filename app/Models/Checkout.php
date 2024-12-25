<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [  
        'tiket_id',  
        'user_id',  
        'jumlah_tiket',  
        'total_harga',  
        'tanggal_checkout',  
        'status',  
    ];  

        // Relasi dengan model Tiket  
    public function tiket()  
        {  
            return $this->belongsTo(Ticket::class, 'tiket_id', 'id');  
        }  
    
        // Relasi dengan model User  
    public function user()  
        {  
            return $this->belongsTo(User::class, 'user_id', 'id');  
        }  
}
