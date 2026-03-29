<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPartners\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPartners\SectorsPageCommunicationsPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCommunicationsPartners extends ListRecords
{
    protected static string $resource = SectorsPageCommunicationsPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة شريك'),
        ];
    }
}