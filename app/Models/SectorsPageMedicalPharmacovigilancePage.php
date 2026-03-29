<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorsPageMedicalPharmacovigilancePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_image',
        'article_ar',
        'article_en',
        'report_emails',
        'report_phones',
        'whatsapp_number',
    ];
}