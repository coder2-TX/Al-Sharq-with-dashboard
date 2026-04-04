<?php

namespace App\Filament\Resources\SectorsPageCarsPages\Pages;

use App\Filament\Resources\SectorsPageCarsPages\SectorsPageCarsPageResource;
use App\Models\SectorsPageCarsPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCarsPages extends ListRecords
{
    protected static string $resource = SectorsPageCarsPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageCarsPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageCarsPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}