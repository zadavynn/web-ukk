<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
  use HasFactory;

  protected $fillable = [
    'nama',
    'jabatan',
    'kelas',
    'telepon',
    'quotes',
  ];
}
