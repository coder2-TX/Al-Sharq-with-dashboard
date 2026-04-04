<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPartners\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPartners\SectorsPageMilkFoodPartnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMilkFoodPartner extends EditRecord
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

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}