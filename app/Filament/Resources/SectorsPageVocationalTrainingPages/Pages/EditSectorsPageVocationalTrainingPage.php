<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPages\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPages\SectorsPageVocationalTrainingPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageVocationalTrainingPage extends EditRecord
{
    protected static string $resource = SectorsPageVocationalTrainingPageResource::class;

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