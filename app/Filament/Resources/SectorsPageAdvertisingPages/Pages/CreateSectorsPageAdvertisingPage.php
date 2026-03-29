<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPages\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPages\SectorsPageAdvertisingPageResource;
use App\Models\SectorsPageAdvertisingPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageAdvertisingPage extends CreateRecord
{
    protected static string $resource = SectorsPageAdvertisingPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageAdvertisingPage::query()->first();

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