<?php

namespace App\Filament\Resources\SectorsPagePaintsPartners\Pages;

use App\Filament\Resources\SectorsPagePaintsPartners\SectorsPagePaintsPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPagePaintsPartner extends CreateRecord
{
    protected static string $resource = SectorsPagePaintsPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}