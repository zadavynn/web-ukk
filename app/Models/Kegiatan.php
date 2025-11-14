<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'tanggal', 'status'];
    protected $casts = [
        'tanggal' => 'date',
    ];

    public function panitias()
    {
        return $this->belongsToMany(Panitia::class, 'kegiatan_panitia');
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'kegiatan_sponsor');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function catatan()
    {
        return $this->hasOne(Catatan::class);
    }
}
