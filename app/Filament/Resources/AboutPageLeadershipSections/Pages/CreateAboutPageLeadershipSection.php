<?php

namespace App\Filament\Resources\AboutPageLeadershipSections\Pages;

use App\Filament\Resources\AboutPageLeadershipSections\AboutPageLeadershipSectionResource;
use App\Models\AboutPageLeadershipSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateAboutPageLeadershipSection extends CreateRecord
{
    protected static string $resource = AboutPageLeadershipSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = AboutPageLeadershipSection::query()->first();

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