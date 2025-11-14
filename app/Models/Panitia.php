<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    protected $fillable = ['nama', 'email', 'telepon'];

    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class, 'kegiatan_panitia');
    }
}
