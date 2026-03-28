<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorsPageMedicalPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_image',
        'article_ar',
        'article_en',
    ];
}