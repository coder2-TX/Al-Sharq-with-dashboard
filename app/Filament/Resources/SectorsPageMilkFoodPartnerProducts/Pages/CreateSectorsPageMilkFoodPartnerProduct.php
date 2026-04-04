<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPartnerProducts\SectorsPageMilkFoodPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMilkFoodPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageMilkFoodPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}