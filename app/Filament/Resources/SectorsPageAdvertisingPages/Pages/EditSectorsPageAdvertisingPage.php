<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPages\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPages\SectorsPageAdvertisingPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageAdvertisingPage extends EditRecord
{
    protected static string $resource = SectorsPageAdvertisingPageResource::class;

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