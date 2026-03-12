<?php

namespace App\Filament\Resources\HomePageNumbersSections\Pages;

use App\Filament\Resources\HomePageNumbersSections\HomePageNumbersSectionResource;
use App\Models\HomePageNumbersSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateHomePageNumbersSection extends CreateRecord
{
    protected static string $resource = HomePageNumbersSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = HomePageNumbersSection::query()->first();

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