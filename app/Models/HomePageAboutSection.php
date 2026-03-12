<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageAboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_ar',
        'lead_en',
        'text_ar',
        'text_en',
        'youtube_url',
    ];
}