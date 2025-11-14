<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['nama', 'kontak', 'jenis_sponsorship'];

    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class, 'kegiatan_sponsor');
    }
}
