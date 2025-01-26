<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'qr';

    // Tentukan kolom yang dapat diisi (Mass Assignment)
    protected $fillable = ['judul', 'detail', 'url'];
}
