<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
    'title', 'category', 'schedule', 'description', 'main_image', 'gallery'
    ];

    protected $casts = [
        'gallery' => 'array', // Agar Laravel tahu 'gallery' adalah array
    ];
}
