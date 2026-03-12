<?php

namespace App\Filament\Resources\HomePageNumbersSections\Pages;

use App\Filament\Resources\HomePageNumbersSections\HomePageNumbersSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditHomePageNumbersSection extends EditRecord
{
    protected static string $resource = HomePageNumbersSectionResource::class;

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