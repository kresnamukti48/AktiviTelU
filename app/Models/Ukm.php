<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $fillable = ['nama_ukm', 'deskripsi_ukm', 'kategori_ukm', 'instagram_ukm', 'email_ukm', 'logo_ukm'];
}
