<?php

namespace App\Filament\Resources\IsoCertificateContents\Pages;

use App\Filament\Resources\IsoCertificateContents\IsoCertificateContentResource;
use App\Models\IsoCertificateContent;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateIsoCertificateContent extends CreateRecord
{
    protected static string $resource = IsoCertificateContentResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = IsoCertificateContent::query()->first();

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