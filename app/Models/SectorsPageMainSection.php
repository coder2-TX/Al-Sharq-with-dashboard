<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorsPageMainSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_sector_image',
        'commercial_sector_image',
    ];
}