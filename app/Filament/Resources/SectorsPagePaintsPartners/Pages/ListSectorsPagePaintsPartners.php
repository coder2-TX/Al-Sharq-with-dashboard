<?php

namespace App\Filament\Resources\SectorsPagePaintsPartners\Pages;

use App\Filament\Resources\SectorsPagePaintsPartners\SectorsPagePaintsPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPagePaintsPartners extends ListRecords
{
    protected static string $resource = SectorsPagePaintsPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة شريك'),
        ];
    }
}