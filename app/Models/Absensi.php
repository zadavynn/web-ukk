<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['kegiatan_id', 'panitia_id', 'status', 'keterangan'];
}
