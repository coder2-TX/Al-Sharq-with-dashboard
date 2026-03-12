<?php

namespace App\Filament\Resources\IsoCertificateContents\Pages;

use App\Filament\Resources\IsoCertificateContents\IsoCertificateContentResource;
use App\Models\IsoCertificateContent;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIsoCertificateContents extends ListRecords
{
    protected static string $resource = IsoCertificateContentResource::class;

    protected function getHeaderActions(): array
    {
        $record = IsoCertificateContent::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(IsoCertificateContentResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}