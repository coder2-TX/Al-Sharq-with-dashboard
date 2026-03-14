<?php

namespace App\Filament\Resources\AboutPageVisionMissionValuesSections\Pages;

use App\Filament\Resources\AboutPageVisionMissionValuesSections\AboutPageVisionMissionValuesSectionResource;
use App\Models\AboutPageVisionMissionValuesSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutPageVisionMissionValuesSections extends ListRecords
{
    protected static string $resource = AboutPageVisionMissionValuesSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = AboutPageVisionMissionValuesSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(AboutPageVisionMissionValuesSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}