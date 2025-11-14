<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['kegiatan_id', 'kelas', 'jumlah_hadir'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
