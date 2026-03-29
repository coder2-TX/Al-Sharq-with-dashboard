<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPages\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPages\SectorsPageCommunicationsPageResource;
use App\Models\SectorsPageCommunicationsPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageCommunicationsPage extends CreateRecord
{
    protected static string $resource = SectorsPageCommunicationsPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageCommunicationsPage::query()->first();

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