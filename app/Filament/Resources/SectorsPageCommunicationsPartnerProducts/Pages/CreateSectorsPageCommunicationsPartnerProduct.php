<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPartnerProducts\SectorsPageCommunicationsPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCommunicationsPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageCommunicationsPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}