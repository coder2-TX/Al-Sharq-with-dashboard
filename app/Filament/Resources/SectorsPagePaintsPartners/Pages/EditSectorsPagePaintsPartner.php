<?php

namespace App\Filament\Resources\SectorsPagePaintsPartners\Pages;

use App\Filament\Resources\SectorsPagePaintsPartners\SectorsPagePaintsPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPagePaintsPartner extends EditRecord
{
    protected static string $resource = SectorsPagePaintsPartnerResource::class;

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