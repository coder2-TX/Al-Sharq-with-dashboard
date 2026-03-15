<?php

namespace App\Filament\Resources\ContactPageMapSections\Pages;

use App\Filament\Resources\ContactPageMapSections\ContactPageMapSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditContactPageMapSection extends EditRecord
{
    protected static string $resource = ContactPageMapSectionResource::class;

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