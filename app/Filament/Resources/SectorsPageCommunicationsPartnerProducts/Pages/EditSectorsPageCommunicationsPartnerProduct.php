<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPartnerProducts\SectorsPageCommunicationsPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageCommunicationsPartnerProduct extends EditRecord
{
    protected static string $resource = SectorsPageCommunicationsPartnerProductResource::class;

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