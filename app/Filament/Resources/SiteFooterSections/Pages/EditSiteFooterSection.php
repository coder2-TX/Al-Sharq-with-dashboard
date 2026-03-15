<?php

namespace App\Filament\Resources\SiteFooterSections\Pages;

use App\Filament\Resources\SiteFooterSections\SiteFooterSectionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSiteFooterSection extends EditRecord
{
    protected static string $resource = SiteFooterSectionResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}