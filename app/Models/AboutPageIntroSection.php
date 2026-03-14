<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageIntroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle_ar',
        'subtitle_en',
        'article_ar',
        'article_en',
    ];

    public function getSubtitleArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->subtitle_ar);
    }

    public function getSubtitleEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->subtitle_en);
    }

    public function getArticleArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->article_ar);
    }

    public function getArticleEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->article_en);
    }
}