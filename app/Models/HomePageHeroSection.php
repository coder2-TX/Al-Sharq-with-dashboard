<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageHeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle_ar',
        'subtitle_en',
    ];
}