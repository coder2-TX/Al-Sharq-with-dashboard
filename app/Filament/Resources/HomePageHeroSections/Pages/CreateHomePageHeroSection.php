<?php

namespace App\Filament\Resources\HomePageHeroSections\Pages;

use App\Filament\Resources\HomePageHeroSections\HomePageHeroSectionResource;
use App\Models\HomePageHeroSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateHomePageHeroSection extends CreateRecord
{
    protected static string $resource = HomePageHeroSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = HomePageHeroSection::query()->first();

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