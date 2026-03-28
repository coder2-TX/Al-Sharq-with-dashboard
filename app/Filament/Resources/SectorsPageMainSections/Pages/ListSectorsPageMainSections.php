<?php

namespace App\Filament\Resources\SectorsPageMainSections\Pages;

use App\Filament\Resources\SectorsPageMainSections\SectorsPageMainSectionResource;
use App\Models\SectorsPageMainSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMainSections extends ListRecords
{
    protected static string $resource = SectorsPageMainSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMainSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMainSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}