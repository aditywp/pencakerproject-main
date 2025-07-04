<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comerciel extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'email', 'no_telp', 'kategori', 'gambar'
    ];
}
