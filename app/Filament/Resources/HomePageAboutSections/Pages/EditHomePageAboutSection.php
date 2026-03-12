<?php

namespace App\Filament\Resources\HomePageAboutSections\Pages;

use App\Filament\Resources\HomePageAboutSections\HomePageAboutSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditHomePageAboutSection extends EditRecord
{
    protected static string $resource = HomePageAboutSectionResource::class;

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