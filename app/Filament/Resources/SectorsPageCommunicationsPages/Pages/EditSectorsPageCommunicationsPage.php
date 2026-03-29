<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPages\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPages\SectorsPageCommunicationsPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageCommunicationsPage extends EditRecord
{
    protected static string $resource = SectorsPageCommunicationsPageResource::class;

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