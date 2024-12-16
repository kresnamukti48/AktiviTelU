<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['user_id', 'nip', 'fakultas', 'ukm_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi Dosen ke UKM
    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'ukm_id');
    }

}