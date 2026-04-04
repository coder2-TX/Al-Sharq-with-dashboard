<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\SectorsPageAdvertisingPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageAdvertisingPartnerProduct extends EditRecord
{
    protected static string $resource = SectorsPageAdvertisingPartnerProductResource::class;

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