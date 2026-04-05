<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPartnerProducts\SectorsPageVocationalTrainingPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageVocationalTrainingPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageVocationalTrainingPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('إضافة منتج'),
        ];
    }
}