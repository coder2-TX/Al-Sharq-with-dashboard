<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPartners\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPartners\SectorsPageCommunicationsPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCommunicationsPartner extends CreateRecord
{
    protected static string $resource = SectorsPageCommunicationsPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}