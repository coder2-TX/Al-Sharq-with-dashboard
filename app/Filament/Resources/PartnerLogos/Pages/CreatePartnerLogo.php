<?php

namespace App\Filament\Resources\PartnerLogos\Pages;

use App\Filament\Resources\PartnerLogos\PartnerLogoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreatePartnerLogo extends CreateRecord
{
    protected static string $resource = PartnerLogoResource::class;

    protected static bool $canCreateAnother = true;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}