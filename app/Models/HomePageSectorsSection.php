<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSectorsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_sector_name_ar',
        'first_sector_name_en',
        'first_sector_image',
        'second_sector_name_ar',
        'second_sector_name_en',
        'second_sector_image',
    ];
}