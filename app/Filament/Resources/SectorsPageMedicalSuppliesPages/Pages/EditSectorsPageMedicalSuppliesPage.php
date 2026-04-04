<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPages\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPages\SectorsPageMedicalSuppliesPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMedicalSuppliesPage extends EditRecord
{
    protected static string $resource = SectorsPageMedicalSuppliesPageResource::class;

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