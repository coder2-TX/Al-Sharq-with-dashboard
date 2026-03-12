<?php

namespace App\Models;

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
        return $this->normalizeLatinDigits($this->certificate_short);
    }

    public function getCertificateNameDisplayAttribute(): string
    {
        return $this->normalizeLatinDigits($this->certificate_name);
    }

    public function getDescriptionArDisplayAttribute(): string
    {
        return $this->formatTextWithEnglishDigits($this->description_ar);
    }

    public function getDescriptionEnDisplayAttribute(): string
    {
        return $this->formatTextWithEnglishDigits($this->description_en);
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

    protected function formatTextWithEnglishDigits(?string $value): string
    {
        $value = (string) $value;

        if ($value === '') {
            return '';
        }

        $pattern = '/[A-Za-z0-9٠-٩۰-۹][A-Za-z0-9٠-٩۰-۹:\/\-.]*[0-9٠-٩۰-۹][A-Za-z0-9٠-٩۰-۹:\/\-.]*/u';

        preg_match_all($pattern, $value, $matches, PREG_OFFSET_CAPTURE);

        $result = '';
        $lastOffset = 0;

        foreach ($matches[0] as [$token, $offset]) {
            $result .= e(substr($value, $lastOffset, $offset - $lastOffset));
            $result .= '<span class="lp-enDigits" dir="ltr" lang="en">' . e($this->normalizeLatinDigits($token)) . '</span>';
            $lastOffset = $offset + strlen($token);
        }

        $result .= e(substr($value, $lastOffset));

        return nl2br($result);
    }

    protected function normalizeLatinDigits(?string $value): string
    {
        return strtr((string) $value, [
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
        ]);
    }
}