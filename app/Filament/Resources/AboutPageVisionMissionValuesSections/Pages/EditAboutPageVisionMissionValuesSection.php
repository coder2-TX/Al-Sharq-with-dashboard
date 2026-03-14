<?php

namespace App\Filament\Resources\AboutPageVisionMissionValuesSections\Pages;

use App\Filament\Resources\AboutPageVisionMissionValuesSections\AboutPageVisionMissionValuesSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditAboutPageVisionMissionValuesSection extends EditRecord
{
    protected static string $resource = AboutPageVisionMissionValuesSectionResource::class;

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