<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TerrainImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'terrain_id', 'image_path', 'uploaded_at',
    ];

    public $timestamps = false;

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }
}
