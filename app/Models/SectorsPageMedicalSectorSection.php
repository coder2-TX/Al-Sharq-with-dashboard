<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorsPageMedicalSectorSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_video',
        'medicines_image',
        'medical_supplies_image',
        'milk_food_image',
    ];
}