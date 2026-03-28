<?php

namespace App\Filament\Resources\SectorsPageMainSections\Pages;

use App\Filament\Resources\SectorsPageMainSections\SectorsPageMainSectionResource;
use App\Models\SectorsPageMainSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMainSection extends CreateRecord
{
    protected static string $resource = SectorsPageMainSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageMainSection::query()->first();

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