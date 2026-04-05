<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPages\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPages\SectorsPageVocationalTrainingPageResource;
use App\Models\SectorsPageVocationalTrainingPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageVocationalTrainingPages extends ListRecords
{
    protected static string $resource = SectorsPageVocationalTrainingPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageVocationalTrainingPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageVocationalTrainingPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}