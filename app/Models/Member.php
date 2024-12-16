<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['ukm_id', 'user_id', 'role_member', 'jurusan', 'nim', 'angkatan'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi Member ke UKM
    public function ukm()
    {
        return $this->belongsTo(UKM::class, 'ukm_id');
    }
}
