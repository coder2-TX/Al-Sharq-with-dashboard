<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPages\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPages\SectorsPageMedicalSuppliesPageResource;
use App\Models\SectorsPageMedicalSuppliesPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicalSuppliesPage extends CreateRecord
{
    protected static string $resource = SectorsPageMedicalSuppliesPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageMedicalSuppliesPage::query()->first();

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