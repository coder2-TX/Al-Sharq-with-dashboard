<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\SectorsPageAdvertisingPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageAdvertisingPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageAdvertisingPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج'),
        ];
    }
}