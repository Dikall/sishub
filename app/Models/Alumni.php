<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'nama',
        'tahun',
        'provinsi_bekerja',
        'kabupaten_bekerja',
        'nama_perusahaan',
        'studi_lanjut',
        'program_studi',
    ];
}
