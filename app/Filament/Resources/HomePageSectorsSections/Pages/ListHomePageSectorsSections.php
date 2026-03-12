<?php

namespace App\Filament\Resources\HomePageSectorsSections\Pages;

use App\Filament\Resources\HomePageSectorsSections\HomePageSectorsSectionResource;
use App\Models\HomePageSectorsSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomePageSectorsSections extends ListRecords
{
    protected static string $resource = HomePageSectorsSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = HomePageSectorsSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(HomePageSectorsSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}