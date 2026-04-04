<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPartnerProducts\SectorsPageMilkFoodPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMilkFoodPartnerProduct extends EditRecord
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

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}