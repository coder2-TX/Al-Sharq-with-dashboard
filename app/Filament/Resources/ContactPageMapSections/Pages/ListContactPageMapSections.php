<?php

namespace App\Filament\Resources\ContactPageMapSections\Pages;

use App\Filament\Resources\ContactPageMapSections\ContactPageMapSectionResource;
use App\Models\ContactPageMapSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContactPageMapSections extends ListRecords
{
    protected static string $resource = ContactPageMapSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = ContactPageMapSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(ContactPageMapSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}