<?php

namespace App\Filament\Resources\ContactPageMapSections\Pages;

use App\Filament\Resources\ContactPageMapSections\ContactPageMapSectionResource;
use App\Models\ContactPageMapSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateContactPageMapSection extends CreateRecord
{
    protected static string $resource = ContactPageMapSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = ContactPageMapSection::query()->first();

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