<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'file',
        'tipe',
    ];

    /**
     * Scope to filter by tipe Foto or Video.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('tipe', $type);
    }
}
