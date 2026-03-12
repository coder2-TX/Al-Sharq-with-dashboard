<?php

namespace App\Filament\Resources\HomePageAboutSections\Pages;

use App\Filament\Resources\HomePageAboutSections\HomePageAboutSectionResource;
use App\Models\HomePageAboutSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateHomePageAboutSection extends CreateRecord
{
    protected static string $resource = HomePageAboutSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = HomePageAboutSection::query()->first();

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