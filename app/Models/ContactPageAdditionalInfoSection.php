<?php

namespace App\Models;

use App\Support\Text\DisplayTextFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageAdditionalInfoSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'phones',
        'emails',
        'addresses',
    ];

    protected $casts = [
        'phones' => 'array',
        'emails' => 'array',
        'addresses' => 'array',
    ];

    public function getPhonesDisplayAttribute(): array
    {
        return collect($this->phones ?? [])
            ->pluck('value')
            ->filter()
            ->map(fn (string $value): string => DisplayTextFormatter::fromPlainText($value, false))
            ->values()
            ->all();
    }

    public function getEmailsDisplayAttribute(): array
    {
        return collect($this->emails ?? [])
            ->pluck('value')
            ->filter()
            ->map(fn (string $value): string => DisplayTextFormatter::fromPlainText($value, false))
            ->values()
            ->all();
    }

    public function getAddressesArDisplayAttribute(): array
    {
        return collect($this->addresses ?? [])
            ->pluck('address_ar')
            ->filter()
            ->map(fn (string $value): string => DisplayTextFormatter::fromPlainText($value))
            ->values()
            ->all();
    }

    public function getAddressesEnDisplayAttribute(): array
    {
        return collect($this->addresses ?? [])
            ->pluck('address_en')
            ->filter()
            ->map(fn (string $value): string => DisplayTextFormatter::fromPlainText($value))
            ->values()
            ->all();
    }
}