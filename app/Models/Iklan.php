<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'email',
        'no_telp',
        'gambar', 
    ];
}
