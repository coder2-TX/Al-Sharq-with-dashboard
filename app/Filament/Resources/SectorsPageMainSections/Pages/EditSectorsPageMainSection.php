<?php

namespace App\Filament\Resources\SectorsPageMainSections\Pages;

use App\Filament\Resources\SectorsPageMainSections\SectorsPageMainSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMainSection extends EditRecord
{
    protected static string $resource = SectorsPageMainSectionResource::class;

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