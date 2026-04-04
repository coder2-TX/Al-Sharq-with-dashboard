<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartners\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPartners\SectorsPageAdvertisingPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageAdvertisingPartners extends ListRecords
{
    protected static string $resource = SectorsPageAdvertisingPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة شريك'),
        ];
    }
}