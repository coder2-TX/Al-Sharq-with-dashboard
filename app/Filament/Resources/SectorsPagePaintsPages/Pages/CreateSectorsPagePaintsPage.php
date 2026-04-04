<?php

namespace App\Filament\Resources\SectorsPagePaintsPages\Pages;

use App\Filament\Resources\SectorsPagePaintsPages\SectorsPagePaintsPageResource;
use App\Models\SectorsPagePaintsPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPagePaintsPage extends CreateRecord
{
    protected static string $resource = SectorsPagePaintsPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPagePaintsPage::query()->first();

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