<?php

namespace App\Filament\Resources\PartnerLogos\Pages;

use App\Filament\Resources\PartnerLogos\PartnerLogoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditPartnerLogo extends EditRecord
{
    protected static string $resource = PartnerLogoResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}