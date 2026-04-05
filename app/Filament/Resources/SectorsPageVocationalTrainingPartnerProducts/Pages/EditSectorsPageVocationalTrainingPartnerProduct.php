<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPartnerProducts\SectorsPageVocationalTrainingPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageVocationalTrainingPartnerProduct extends EditRecord
{
    protected static string $resource = SectorsPageVocationalTrainingPartnerProductResource::class;

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