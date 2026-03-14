<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutPageTodaySection extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'subtitle_ar',
        'subtitle_en',
    ];

    public function getSubtitleArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->subtitle_ar);
    }

    public function getSubtitleEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->subtitle_en);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return Storage::disk('public')->url($this->image);
        }

        return asset('assets/images/pages/about/section4/1.jpeg');
    }
}