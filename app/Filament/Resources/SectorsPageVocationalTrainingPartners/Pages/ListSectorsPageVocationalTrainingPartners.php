<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPartners\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPartners\SectorsPageVocationalTrainingPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageVocationalTrainingPartners extends ListRecords
{
    protected static string $resource = SectorsPageVocationalTrainingPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('إضافة شريك'),
        ];
    }
}