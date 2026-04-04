<?php

namespace App\Filament\Resources\SectorsPageCarsPartners\Pages;

use App\Filament\Resources\SectorsPageCarsPartners\SectorsPageCarsPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageCarsPartner extends EditRecord
{
    protected static string $resource = SectorsPageCarsPartnerResource::class;

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