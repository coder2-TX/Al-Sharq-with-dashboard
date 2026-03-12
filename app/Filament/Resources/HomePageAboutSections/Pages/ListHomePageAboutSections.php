<?php

namespace App\Filament\Resources\HomePageAboutSections\Pages;

use App\Filament\Resources\HomePageAboutSections\HomePageAboutSectionResource;
use App\Models\HomePageAboutSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomePageAboutSections extends ListRecords
{
    protected static string $resource = HomePageAboutSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = HomePageAboutSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(HomePageAboutSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}