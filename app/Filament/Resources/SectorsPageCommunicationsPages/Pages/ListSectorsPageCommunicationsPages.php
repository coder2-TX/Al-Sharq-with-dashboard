<?php

namespace App\Filament\Resources\SectorsPageCommunicationsPages\Pages;

use App\Filament\Resources\SectorsPageCommunicationsPages\SectorsPageCommunicationsPageResource;
use App\Models\SectorsPageCommunicationsPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageCommunicationsPages extends ListRecords
{
    protected static string $resource = SectorsPageCommunicationsPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageCommunicationsPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageCommunicationsPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}