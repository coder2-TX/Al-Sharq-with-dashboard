<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorsPageCommercialSectorSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_video',
        'cars_image',
        'communications_image',
        'advertising_image',
        'paints_image',
        'vocational_training_image',
    ];
}