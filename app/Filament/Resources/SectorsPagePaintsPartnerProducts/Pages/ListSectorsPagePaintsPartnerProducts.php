<?php

namespace App\Filament\Resources\SectorsPagePaintsPartnerProducts\Pages;

use App\Filament\Resources\SectorsPagePaintsPartnerProducts\SectorsPagePaintsPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPagePaintsPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPagePaintsPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج'),
        ];
    }
}