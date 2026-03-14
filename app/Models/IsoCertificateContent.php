<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class IsoCertificateContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_short',
        'certificate_name',
        'description_ar',
        'description_en',
        'certificate_icon',
        'certificate_image',
    ];

    public function getCertificateShortDisplayAttribute(): string
    {
        return DisplayTextFormatter::normalizeLatinDigits($this->certificate_short);
    }

    public function getCertificateNameDisplayAttribute(): string
    {
        return DisplayTextFormatter::normalizeLatinDigits($this->certificate_name);
    }

    public function getDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->description_ar);
    }

    public function getDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->description_en);
    }

    public function getCertificateIconUrlAttribute(): string
    {
        return $this->certificate_icon
            ? Storage::disk('public')->url($this->certificate_icon)
            : asset('assets/images/iso-9001.png');
    }

    public function getCertificateImageUrlAttribute(): string
    {
        return $this->certificate_image
            ? Storage::disk('public')->url($this->certificate_image)
            : asset('assets/images/about/ISO-9001.jpg');
    }
}