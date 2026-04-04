<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPartnerProducts\SectorsPageMedicalSuppliesPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicalSuppliesPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageMedicalSuppliesPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}