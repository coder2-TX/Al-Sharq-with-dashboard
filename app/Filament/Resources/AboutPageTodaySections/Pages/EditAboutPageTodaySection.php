<?php

namespace App\Filament\Resources\AboutPageTodaySections\Pages;

use App\Filament\Resources\AboutPageTodaySections\AboutPageTodaySectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditAboutPageTodaySection extends EditRecord
{
    protected static string $resource = AboutPageTodaySectionResource::class;

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