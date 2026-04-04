<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPartners\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPartners\SectorsPageMedicalSuppliesPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicalSuppliesPartner extends CreateRecord
{
    protected static string $resource = SectorsPageMedicalSuppliesPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}