<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    // Daftarkan semua kolom yang boleh diisi
    protected $fillable = [
        'title',
        'slug',
        'penulis',
        'image',
        'content',
        'published_at',
    ];

    // Mengubah tipe data 'published_at' menjadi objek tanggal
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
