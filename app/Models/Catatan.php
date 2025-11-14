<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $fillable = ['kegiatan_id', 'evaluasi', 'perbaikan'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
