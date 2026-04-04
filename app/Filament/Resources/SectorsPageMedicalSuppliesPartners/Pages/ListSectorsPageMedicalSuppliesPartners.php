<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPartners\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPartners\SectorsPageMedicalSuppliesPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicalSuppliesPartners extends ListRecords
{
    protected static string $resource = SectorsPageMedicalSuppliesPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة شريك'),
        ];
    }
}