<?php

namespace App\Filament\Resources\SiteFooterSections\Pages;

use App\Filament\Resources\SiteFooterSections\SiteFooterSectionResource;
use App\Models\SiteFooterSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSiteFooterSection extends CreateRecord
{
    protected static string $resource = SiteFooterSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SiteFooterSection::query()->first();

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