<?php

namespace App\Filament\Resources\SectorsPageMedicalSuppliesPages\Pages;

use App\Filament\Resources\SectorsPageMedicalSuppliesPages\SectorsPageMedicalSuppliesPageResource;
use App\Models\SectorsPageMedicalSuppliesPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicalSuppliesPages extends ListRecords
{
    protected static string $resource = SectorsPageMedicalSuppliesPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMedicalSuppliesPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMedicalSuppliesPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}