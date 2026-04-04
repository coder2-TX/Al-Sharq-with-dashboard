<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPartnerProducts\SectorsPageMedicalSuppliesPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicalSuppliesPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageMedicalSuppliesPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج'),
        ];
    }
}