<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'nama_jurusan',
        'deskripsi',
        'visi',
        'misi',
        'tujuan',
        'foto', // Pastikan menambahkan kolom foto di sini
    ];
}
