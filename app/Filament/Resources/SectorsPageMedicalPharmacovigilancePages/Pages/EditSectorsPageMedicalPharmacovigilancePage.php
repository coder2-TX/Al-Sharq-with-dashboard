<?php

namespace App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\Pages;

use App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\SectorsPageMedicalPharmacovigilancePageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMedicalPharmacovigilancePage extends EditRecord
{
    protected static string $resource = SectorsPageMedicalPharmacovigilancePageResource::class;

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