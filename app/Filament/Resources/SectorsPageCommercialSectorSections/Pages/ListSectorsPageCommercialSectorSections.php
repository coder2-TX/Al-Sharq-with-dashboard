<?php

namespace App\Filament\Resources\SectorsPageCommercialSectorSections\Pages;

use App\Filament\Resources\SectorsPageCommercialSectorSections\SectorsPageCommercialSectorSectionResource;
use App\Models\SectorsPageCommercialSectorSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCommercialSectorSections extends ListRecords
{
    protected static string $resource = SectorsPageCommercialSectorSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageCommercialSectorSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageCommercialSectorSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}