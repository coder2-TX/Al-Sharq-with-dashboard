<?php

namespace App\Filament\Resources\AboutPageTodaySections\Pages;

use App\Filament\Resources\AboutPageTodaySections\AboutPageTodaySectionResource;
use App\Models\AboutPageTodaySection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutPageTodaySections extends ListRecords
{
    protected static string $resource = AboutPageTodaySectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = AboutPageTodaySection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(AboutPageTodaySectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}