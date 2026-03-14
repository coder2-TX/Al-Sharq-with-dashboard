<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageVisionMissionValuesSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'vision_text_ar',
        'vision_text_en',
        'mission_text_ar',
        'mission_text_en',
        'values_text_ar',
        'values_text_en',
    ];

    public function getVisionTextArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->vision_text_ar);
    }

    public function getVisionTextEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->vision_text_en);
    }

    public function getMissionTextArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->mission_text_ar);
    }

    public function getMissionTextEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->mission_text_en);
    }

    public function getValuesTextArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->values_text_ar);
    }

    public function getValuesTextEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->values_text_en);
    }
}