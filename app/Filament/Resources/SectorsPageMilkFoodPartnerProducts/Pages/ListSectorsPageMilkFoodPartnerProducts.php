<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPartnerProducts\SectorsPageMilkFoodPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMilkFoodPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageMilkFoodPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج'),
        ];
    }
}