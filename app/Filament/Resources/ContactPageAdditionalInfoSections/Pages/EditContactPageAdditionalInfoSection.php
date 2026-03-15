<?php

namespace App\Filament\Resources\ContactPageAdditionalInfoSections\Pages;

use App\Filament\Resources\ContactPageAdditionalInfoSections\ContactPageAdditionalInfoSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditContactPageAdditionalInfoSection extends EditRecord
{
    protected static string $resource = ContactPageAdditionalInfoSectionResource::class;

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