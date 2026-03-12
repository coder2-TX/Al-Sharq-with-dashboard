<?php

namespace App\Filament\Resources\HomePageSectorsSections\Pages;

use App\Filament\Resources\HomePageSectorsSections\HomePageSectorsSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditHomePageSectorsSection extends EditRecord
{
    protected static string $resource = HomePageSectorsSectionResource::class;

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