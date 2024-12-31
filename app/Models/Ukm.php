<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $fillable = ['nama_ukm', 'deskripsi_ukm', 'kategori_ukm', 'instagram_ukm', 'email_ukm', 'logo_ukm'];

    public function members()  
    {  
        return $this->hasMany(Member::class, 'ukm_id'); // Pastikan mengganti 'ukm_id' dengan nama kolom yang sesuai  
    }  

    public function kegiatan()  
    {  
        return $this->hasMany(KegiatanUkm::class, 'ukm_id'); // Pastikan mengganti 'ukm_id' dengan nama kolom yang sesuai  
    }  

    public function dosens()  
    {  
        return $this->hasMany(Dosen::class, 'ukm_id'); // 1 UKM memiliki banyak dosen  
    }  

    public function users()  
    {  
        return $this->hasManyThrough(  
            User::class,   
            Member::class,   
            'ukm_id',   // Foreign key di tabel member  
            'id',       // Foreign key di tabel users  
            'id',       // Local key di tabel ukms  
            'user_id'   // Local key di tabel member  
        );  
    }  
}
