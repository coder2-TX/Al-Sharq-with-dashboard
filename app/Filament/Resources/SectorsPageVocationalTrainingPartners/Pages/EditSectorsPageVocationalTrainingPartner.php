<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPartners\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPartners\SectorsPageVocationalTrainingPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageVocationalTrainingPartner extends EditRecord
{
    protected static string $resource = SectorsPageVocationalTrainingPartnerResource::class;

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