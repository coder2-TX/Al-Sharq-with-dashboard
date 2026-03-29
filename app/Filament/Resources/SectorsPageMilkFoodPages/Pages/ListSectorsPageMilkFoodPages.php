<?php

namespace App\Filament\Resources\SectorsPageMilkFoodPages\Pages;

use App\Filament\Resources\SectorsPageMilkFoodPages\SectorsPageMilkFoodPageResource;
use App\Models\SectorsPageMilkFoodPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMilkFoodPages extends ListRecords
{
    protected static string $resource = SectorsPageMilkFoodPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMilkFoodPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMilkFoodPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}