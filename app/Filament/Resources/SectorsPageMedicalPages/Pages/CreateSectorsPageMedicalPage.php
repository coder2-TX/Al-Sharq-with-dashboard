<?php

namespace App\Filament\Resources\SectorsPageMedicalPages\Pages;

use App\Filament\Resources\SectorsPageMedicalPages\SectorsPageMedicalPageResource;
use App\Models\SectorsPageMedicalPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicalPage extends CreateRecord
{
    protected static string $resource = SectorsPageMedicalPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageMedicalPage::query()->first();

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