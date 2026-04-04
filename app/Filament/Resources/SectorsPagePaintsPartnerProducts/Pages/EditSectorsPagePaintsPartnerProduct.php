<?php

namespace App\Filament\Resources\SectorsPagePaintsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPagePaintsPartnerProducts\SectorsPagePaintsPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPagePaintsPartnerProduct extends EditRecord
{
    protected static string $resource = SectorsPagePaintsPartnerProductResource::class;

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