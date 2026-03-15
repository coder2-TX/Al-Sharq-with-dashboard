<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteFooterSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp_number',
        'facebook_url',
        'instagram_url',
        'phone',
        'email',
        'address_ar',
        'address_en',
        'home_description_ar',
        'home_description_en',
        'about_description_ar',
        'about_description_en',
        'news_description_ar',
        'news_description_en',
        'sectors_description_ar',
        'sectors_description_en',
        'contact_description_ar',
        'contact_description_en',
    ];

    public function getWhatsappNumberDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->whatsapp_number, false);
    }

    public function getPhoneDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->phone, false);
    }

    public function getEmailDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->email, false);
    }

    public function getAddressArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->address_ar);
    }

    public function getAddressEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->address_en);
    }

    public function getHomeDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->home_description_ar);
    }

    public function getHomeDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->home_description_en);
    }

    public function getAboutDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->about_description_ar);
    }

    public function getAboutDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->about_description_en);
    }

    public function getNewsDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->news_description_ar);
    }

    public function getNewsDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->news_description_en);
    }

    public function getSectorsDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->sectors_description_ar);
    }

    public function getSectorsDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->sectors_description_en);
    }

    public function getContactDescriptionArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->contact_description_ar);
    }

    public function getContactDescriptionEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->contact_description_en);
    }

    public function getWhatsappHrefAttribute(): string
    {
        $number = preg_replace('/[^0-9]/', '', DisplayTextFormatter::normalizeLatinDigits($this->whatsapp_number));

        return $number ? 'https://wa.me/' . $number : '#';
    }

    public function getPhoneHrefAttribute(): string
    {
        $phone = preg_replace('/[^0-9+]/', '', DisplayTextFormatter::normalizeLatinDigits($this->phone));

        return $phone ? 'tel:' . $phone : '#';
    }

    public function getEmailHrefAttribute(): string
    {
        return $this->email ? 'mailto:' . $this->email : '#';
    }
}