<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPages\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPages\SectorsPageMilkFoodPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMilkFoodPage extends EditRecord
{
    protected static string $resource = SectorsPageMilkFoodPageResource::class;

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