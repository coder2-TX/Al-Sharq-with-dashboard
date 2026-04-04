<?php

namespace App\Filament\Resources\SectorsPagePaintsPages\Pages;

use App\Filament\Resources\SectorsPagePaintsPages\SectorsPagePaintsPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPagePaintsPage extends EditRecord
{
    protected static string $resource = SectorsPagePaintsPageResource::class;

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