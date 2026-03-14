<?php

namespace App\Filament\Resources\AboutPageVisionMissionValuesSections\Pages;

use App\Filament\Resources\AboutPageVisionMissionValuesSections\AboutPageVisionMissionValuesSectionResource;
use App\Models\AboutPageVisionMissionValuesSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateAboutPageVisionMissionValuesSection extends CreateRecord
{
    protected static string $resource = AboutPageVisionMissionValuesSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = AboutPageVisionMissionValuesSection::query()->first();

        if ($record) {
            $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
            return;
        }

        parent::mount();
    }

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}