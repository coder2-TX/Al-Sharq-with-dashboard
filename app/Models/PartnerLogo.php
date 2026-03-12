<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PartnerLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        return $this->image_path
            ? Storage::disk('public')->url($this->image_path)
            : '';
    }
}