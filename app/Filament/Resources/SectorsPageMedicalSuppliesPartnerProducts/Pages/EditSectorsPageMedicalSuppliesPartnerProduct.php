<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPartnerProducts\SectorsPageMedicalSuppliesPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMedicalSuppliesPartnerProduct extends EditRecord
{
    protected static string $resource = SectorsPageMedicalSuppliesPartnerProductResource::class;

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