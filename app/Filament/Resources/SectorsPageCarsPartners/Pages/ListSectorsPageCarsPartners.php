<?php

namespace App\Filament\Resources\SectorsPageCarsPartners\Pages;

use App\Filament\Resources\SectorsPageCarsPartners\SectorsPageCarsPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCarsPartners extends ListRecords
{
    protected static string $resource = SectorsPageCarsPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة شريك'),
        ];
    }
}