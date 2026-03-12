<?php

namespace App\Filament\Resources\HomePageHeroSections\Pages;

use App\Filament\Resources\HomePageHeroSections\HomePageHeroSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditHomePageHeroSection extends EditRecord
{
    protected static string $resource = HomePageHeroSectionResource::class;

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