<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPages\Pages;

use App\Filament\Resources\SectorsPageAdvertisingPages\SectorsPageAdvertisingPageResource;
use App\Models\SectorsPageAdvertisingPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageAdvertisingPages extends ListRecords
{
    protected static string $resource = SectorsPageAdvertisingPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageAdvertisingPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageAdvertisingPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}