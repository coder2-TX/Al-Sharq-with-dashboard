<?php

namespace App\Filament\Resources\SectorsPageCarsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageCarsPartnerProducts\SectorsPageCarsPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageCarsPartnerProduct extends EditRecord
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

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}