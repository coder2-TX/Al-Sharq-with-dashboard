<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\SectorsPageAdvertisingPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageAdvertisingPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageAdvertisingPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}