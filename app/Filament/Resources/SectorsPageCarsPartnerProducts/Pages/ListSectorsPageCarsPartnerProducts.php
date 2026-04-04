<?php

namespace App\Filament\Resources\SectorsPageCarsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageCarsPartnerProducts\SectorsPageCarsPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCarsPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageCarsPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج'),
        ];
    }
}