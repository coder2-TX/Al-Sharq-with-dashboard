<?php

namespace App\Filament\Resources\SectorsPageMedicalSectorSections\Pages;

use App\Filament\Resources\SectorsPageMedicalSectorSections\SectorsPageMedicalSectorSectionResource;
use App\Models\SectorsPageMedicalSectorSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicalSectorSections extends ListRecords
{
    protected static string $resource = SectorsPageMedicalSectorSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMedicalSectorSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMedicalSectorSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}