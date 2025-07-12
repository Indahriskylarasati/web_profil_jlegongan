<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
     protected $fillable = [
        'nama_pemilik',
        'jenis_usaha',
        'deskripsi',
        'kategori',
        'foto_utama',
        'nomor_wa',
        'akun_instagram',
    ];
}
