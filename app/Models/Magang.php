<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Magang extends Model
{
    protected $fillable = [
        'keahlian',
        'min_pendidikan',
        'gaji',
        'deskripsi',
        'email',
        'no_telp',
        'foto',
        'user_id' // ini WAJIB ditambah 
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
