<?php

namespace App\Filament\Resources\ContactPageAdditionalInfoSections\Pages;

use App\Filament\Resources\ContactPageAdditionalInfoSections\ContactPageAdditionalInfoSectionResource;
use App\Models\ContactPageAdditionalInfoSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateContactPageAdditionalInfoSection extends CreateRecord
{
    protected static string $resource = ContactPageAdditionalInfoSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = ContactPageAdditionalInfoSection::query()->first();

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