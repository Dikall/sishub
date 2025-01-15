<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Galeri extends Model
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'file',
        'tipe',
    ];
    // You can define custom media collections if needed
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('file')->singleFile();
    }
    /**
     * Scope to filter by tipe Foto or Video.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('tipe', $type);
    }
}
