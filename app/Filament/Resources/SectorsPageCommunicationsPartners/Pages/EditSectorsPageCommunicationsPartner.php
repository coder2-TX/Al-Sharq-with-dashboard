<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPartners\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPartners\SectorsPageCommunicationsPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageCommunicationsPartner extends EditRecord
{
    protected static string $resource = SectorsPageCommunicationsPartnerResource::class;

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