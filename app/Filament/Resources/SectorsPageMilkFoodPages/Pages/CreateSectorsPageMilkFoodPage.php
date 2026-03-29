<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPages\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPages\SectorsPageMilkFoodPageResource;
use App\Models\SectorsPageMilkFoodPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMilkFoodPage extends CreateRecord
{
    protected static string $resource = SectorsPageMilkFoodPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageMilkFoodPage::query()->first();

        if ($record) {
            $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
            return;
        }

        parent::mount();
    }

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}