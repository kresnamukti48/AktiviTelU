<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no_telepon','jenis_kelamin', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->last_name}";
    }

    public function members()  
    {  
        return $this->hasMany(Member::class, 'user_id');  
    }  

    public function ukms()  
    {  
        // Ambil UKM dari anggota  
        $memberUkms = $this->hasManyThrough(Ukm::class, Member::class, 'user_id', 'id', 'id', 'ukm_id')->get();  
    
        // Ambil UKM dari dosen  
        $dosenUkms = $this->hasManyThrough(Ukm::class, Dosen::class, 'user_id', 'id', 'id', 'ukm_id')->get();  
    
        // Gabungkan kedua koleksi  
        return $memberUkms->merge($dosenUkms)->unique('id'); // Menghindari duplikasi  
    }
}
