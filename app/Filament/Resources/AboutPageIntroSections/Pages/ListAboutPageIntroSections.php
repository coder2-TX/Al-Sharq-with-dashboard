<?php

namespace App\Filament\Resources\AboutPageIntroSections\Pages;

use App\Filament\Resources\AboutPageIntroSections\AboutPageIntroSectionResource;
use App\Models\AboutPageIntroSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutPageIntroSections extends ListRecords
{
    protected static string $resource = AboutPageIntroSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = AboutPageIntroSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(AboutPageIntroSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}