<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SectorsPageMedicinesPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'sort_order',
        'partner_image',
        'products_hero_image',
        'partner_name',
        'partner_url',
        'description_ar',
        'description_en',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(SectorsPageMedicinesPartnerProduct::class, 'partner_id')
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}