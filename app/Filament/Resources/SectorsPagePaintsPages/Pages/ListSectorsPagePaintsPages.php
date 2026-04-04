<?php

namespace App\Filament\Resources\SectorsPagePaintsPages\Pages;

use App\Filament\Resources\SectorsPagePaintsPages\SectorsPagePaintsPageResource;
use App\Models\SectorsPagePaintsPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPagePaintsPages extends ListRecords
{
    protected static string $resource = SectorsPagePaintsPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPagePaintsPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPagePaintsPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}