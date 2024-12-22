<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanUkm extends Model
{
    protected $fillable = ['nama_kegiatan',  'tanggal_kegiatan', 'lokasi_kegiatan','deskripsi_kegiatan', 'gambar_kegiatan', 'ukm_id'];

    public function ukm()
    {
        return $this->belongsTo(UKM::class, 'ukm_id');
    }

}