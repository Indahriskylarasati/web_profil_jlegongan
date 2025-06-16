<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * This ensures the model uses the 'pengurus' table.
     *
     * @var string
     */
    protected $table = 'pengurus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'urutan',
    ];
}
