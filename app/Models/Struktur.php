<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;

    protected $table = 'struktur';

    protected $fillable = [
        'jurusan_id',
        'nama',
        'posisi'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
