<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'syarat',
        'deadline',
        'email',
        'no_telp',
        'foto',
        'min_pendidikan',
        'user_id',
    ];

    // Relasi ke User (Perusahaan yang buat beasiswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
