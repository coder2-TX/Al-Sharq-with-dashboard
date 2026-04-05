<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPages\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPages\SectorsPageVocationalTrainingPageResource;
use App\Models\SectorsPageVocationalTrainingPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageVocationalTrainingPage extends CreateRecord
{
    protected static string $resource = SectorsPageVocationalTrainingPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageVocationalTrainingPage::query()->first();

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