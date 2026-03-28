<?php

namespace App\Filament\Resources\SectorsPageMedicalPages\Pages;

use App\Filament\Resources\SectorsPageMedicalPages\SectorsPageMedicalPageResource;
use App\Models\SectorsPageMedicalPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicalPages extends ListRecords
{
    protected static string $resource = SectorsPageMedicalPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMedicalPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMedicalPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}