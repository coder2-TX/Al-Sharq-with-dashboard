<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPartners\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPartners\SectorsPageMilkFoodPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMilkFoodPartner extends CreateRecord
{
    protected static string $resource = SectorsPageMilkFoodPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}