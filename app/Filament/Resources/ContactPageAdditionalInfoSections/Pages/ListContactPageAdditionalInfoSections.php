<?php

namespace App\Filament\Resources\ContactPageAdditionalInfoSections\Pages;

use App\Filament\Resources\ContactPageAdditionalInfoSections\ContactPageAdditionalInfoSectionResource;
use App\Models\ContactPageAdditionalInfoSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContactPageAdditionalInfoSections extends ListRecords
{
    protected static string $resource = ContactPageAdditionalInfoSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = ContactPageAdditionalInfoSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(ContactPageAdditionalInfoSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}