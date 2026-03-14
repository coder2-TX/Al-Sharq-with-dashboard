<?php

namespace App\Filament\Resources\AboutPageTodaySections\Pages;

use App\Filament\Resources\AboutPageTodaySections\AboutPageTodaySectionResource;
use App\Models\AboutPageTodaySection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateAboutPageTodaySection extends CreateRecord
{
    protected static string $resource = AboutPageTodaySectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = AboutPageTodaySection::query()->first();

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