<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['nama', 'tanggal', 'lokasi', 'status'];
    protected $casts = [
        'tanggal' => 'date',
    ];
}
