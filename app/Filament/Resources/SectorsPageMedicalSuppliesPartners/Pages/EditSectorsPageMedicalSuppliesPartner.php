<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPartners\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPartners\SectorsPageMedicalSuppliesPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMedicalSuppliesPartner extends EditRecord
{
    protected static string $resource = SectorsPageMedicalSuppliesPartnerResource::class;

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