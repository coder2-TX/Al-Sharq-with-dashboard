<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewsPageArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'published_at',
        'title_ar',
        'title_en',
        'image',
        'description_ar',
        'description_en',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function getPublishedAtDisplayAttribute(): string
    {
        if (! $this->published_at) {
            return '';
        }

        return DisplayTextFormatter::fromPlainText($this->published_at->format('M d, Y'), false);
    }

    public function getTitleArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->title_ar, false);
    }

    public function getTitleEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->title_en, false);
    }

    public function getDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->description_ar);
    }

    public function getDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->description_en);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return Storage::disk('public')->url($this->image);
        }

        return asset('assets/images/news/1.jpg');
    }
}