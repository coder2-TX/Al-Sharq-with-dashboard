<?php

namespace App\Filament\Resources\AboutPageIntroSections\Pages;

use App\Filament\Resources\AboutPageIntroSections\AboutPageIntroSectionResource;
use App\Models\AboutPageIntroSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateAboutPageIntroSection extends CreateRecord
{
    protected static string $resource = AboutPageIntroSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = AboutPageIntroSection::query()->first();

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