<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'phone',
        'address_ar',
        'address_en',
        'whatsapp_number',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::creating(function (ContactPageBranch $record) {
            if (! filled($record->sort_order)) {
                $record->sort_order = ((int) static::query()->max('sort_order')) + 1;
            }
        });
    }

    public function getNameArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->name_ar, false);
    }

    public function getNameEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->name_en, false);
    }

    public function getEmailDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->email, false);
    }

    public function getPhoneDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->phone, false);
    }

    public function getAddressArDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->address_ar, true);
    }

    public function getAddressEnDisplayAttribute(): string
    {
        return DisplayTextFormatter::fromPlainText($this->address_en, true);
    }

    public function getWhatsappNumberNormalizedAttribute(): string
    {
        $value = DisplayTextFormatter::normalizeLatinDigits($this->whatsapp_number);

        return preg_replace('/[^0-9]/', '', $value) ?: '';
    }
}