<?php

namespace App\Filament\Resources\HomePageHeroSections\Pages;

use App\Filament\Resources\HomePageHeroSections\HomePageHeroSectionResource;
use App\Models\HomePageHeroSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomePageHeroSections extends ListRecords
{
    protected static string $resource = HomePageHeroSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = HomePageHeroSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(HomePageHeroSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة النص'),
        ];
    }
}