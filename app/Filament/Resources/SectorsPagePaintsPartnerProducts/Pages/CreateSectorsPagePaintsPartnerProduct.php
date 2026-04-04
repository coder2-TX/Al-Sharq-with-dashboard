<?php

namespace App\Filament\Resources\SectorsPagePaintsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPagePaintsPartnerProducts\SectorsPagePaintsPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPagePaintsPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPagePaintsPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}