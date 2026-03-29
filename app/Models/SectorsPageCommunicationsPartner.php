<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorsPageCommunicationsPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'sort_order',
        'partner_image',
        'partner_name',
        'description_ar',
        'description_en',
    ];
}