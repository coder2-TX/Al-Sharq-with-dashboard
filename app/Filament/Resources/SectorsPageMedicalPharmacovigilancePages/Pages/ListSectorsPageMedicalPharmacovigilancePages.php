<?php

namespace App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\Pages;

use App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\SectorsPageMedicalPharmacovigilancePageResource;
use App\Models\SectorsPageMedicalPharmacovigilancePage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicalPharmacovigilancePages extends ListRecords
{
    protected static string $resource = SectorsPageMedicalPharmacovigilancePageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMedicalPharmacovigilancePage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMedicalPharmacovigilancePageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}