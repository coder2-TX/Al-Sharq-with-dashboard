<?php

namespace App\Filament\Resources\SectorsPageCarsPages\Pages;

use App\Filament\Resources\SectorsPageCarsPages\SectorsPageCarsPageResource;
use App\Models\SectorsPageCarsPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCarsPage extends CreateRecord
{
    protected static string $resource = SectorsPageCarsPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageCarsPage::query()->first();

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