<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectorsPageAdvertisingPartnerProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'sort_order',
        'product_image',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(SectorsPageAdvertisingPartner::class, 'partner_id');
    }
}