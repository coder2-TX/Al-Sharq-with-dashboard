<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartners\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPartners\SectorsPageAdvertisingPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageAdvertisingPartner extends CreateRecord
{
    protected static string $resource = SectorsPageAdvertisingPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}