<?php

namespace App\Filament\Resources\SectorsPageCarsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageCarsPartnerProducts\SectorsPageCarsPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCarsPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageCarsPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}