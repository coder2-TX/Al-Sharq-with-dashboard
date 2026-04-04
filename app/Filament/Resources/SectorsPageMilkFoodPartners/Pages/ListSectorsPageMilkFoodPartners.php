<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPartners\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPartners\SectorsPageMilkFoodPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMilkFoodPartners extends ListRecords
{
    protected static string $resource = SectorsPageMilkFoodPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة شريك'),
        ];
    }
}