<?php

namespace App\Filament\Resources\SectorsPageCommercialSectorSections\Pages;

use App\Filament\Resources\SectorsPageCommercialSectorSections\SectorsPageCommercialSectorSectionResource;
use App\Models\SectorsPageCommercialSectorSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCommercialSectorSection extends CreateRecord
{
    protected static string $resource = SectorsPageCommercialSectorSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageCommercialSectorSection::query()->first();

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