<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageNumbersSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_1_name_ar',
        'item_1_name_en',
        'item_1_number',
        'item_2_name_ar',
        'item_2_name_en',
        'item_2_number',
        'item_3_name_ar',
        'item_3_name_en',
        'item_3_number',
        'item_4_name_ar',
        'item_4_name_en',
        'item_4_number',
        'item_5_name_ar',
        'item_5_name_en',
        'item_5_number',
        'item_6_name_ar',
        'item_6_name_en',
        'item_6_number',
    ];

    protected $casts = [
        'item_1_number' => 'integer',
        'item_2_number' => 'integer',
        'item_3_number' => 'integer',
        'item_4_number' => 'integer',
        'item_5_number' => 'integer',
        'item_6_number' => 'integer',
    ];
}