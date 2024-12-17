<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['nama_event', 'deskripsi_event', 'tanggal_event', 'lokasi_event', 'gambar_event', 'ukm_id'];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'ukm_id');
    }
}