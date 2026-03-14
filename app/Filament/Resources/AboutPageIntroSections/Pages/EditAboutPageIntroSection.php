<?php

namespace App\Filament\Resources\AboutPageIntroSections\Pages;

use App\Filament\Resources\AboutPageIntroSections\AboutPageIntroSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditAboutPageIntroSection extends EditRecord
{
    protected static string $resource = AboutPageIntroSectionResource::class;

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