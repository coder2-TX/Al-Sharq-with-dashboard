<?php

namespace App\Filament\Resources\HomePageNumbersSections\Pages;

use App\Filament\Resources\HomePageNumbersSections\HomePageNumbersSectionResource;
use App\Models\HomePageNumbersSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomePageNumbersSections extends ListRecords
{
    protected static string $resource = HomePageNumbersSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = HomePageNumbersSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(HomePageNumbersSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}