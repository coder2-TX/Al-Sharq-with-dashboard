<?php

namespace App\Filament\Resources\SectorsPageCarsPartners\Pages;

use App\Filament\Resources\SectorsPageCarsPartners\SectorsPageCarsPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCarsPartner extends CreateRecord
{
    protected static string $resource = SectorsPageCarsPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}