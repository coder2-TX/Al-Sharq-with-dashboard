<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPartnerProducts\SectorsPageCommunicationsPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCommunicationsPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageCommunicationsPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج'),
        ];
    }
}