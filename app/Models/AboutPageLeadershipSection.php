<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutPageLeadershipSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'chairman_name_ar',
        'chairman_name_en',
        'chairman_image',
        'chairman_message_ar',
        'chairman_message_en',
        'general_manager_name_ar',
        'general_manager_name_en',
        'general_manager_image',
        'general_manager_message_ar',
        'general_manager_message_en',
    ];

    public function getChairmanNameArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->chairman_name_ar, false);
    }

    public function getChairmanNameEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->chairman_name_en, false);
    }

    public function getChairmanMessageArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->chairman_message_ar);
    }

    public function getChairmanMessageEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->chairman_message_en);
    }

    public function getGeneralManagerNameArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->general_manager_name_ar, false);
    }

    public function getGeneralManagerNameEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->general_manager_name_en, false);
    }

    public function getGeneralManagerMessageArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->general_manager_message_ar);
    }

    public function getGeneralManagerMessageEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromRichEditor($this->general_manager_message_en);
    }

    public function getChairmanImageUrlAttribute(): string
    {
        if ($this->chairman_image) {
            return Storage::disk('public')->url($this->chairman_image);
        }

        return asset('assets/images/pages/about/section3/Chairman_of_the_Board.jpg');
    }

    public function getGeneralManagerImageUrlAttribute(): string
    {
        if ($this->general_manager_image) {
            return Storage::disk('public')->url($this->general_manager_image);
        }

        return asset('assets/images/pages/about/section3/General_Manager.jpg');
    }
}