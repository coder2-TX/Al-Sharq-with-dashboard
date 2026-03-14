<?php

namespace App\Filament\Resources\AboutPageLeadershipSections\Pages;

use App\Filament\Resources\AboutPageLeadershipSections\AboutPageLeadershipSectionResource;
use App\Models\AboutPageLeadershipSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutPageLeadershipSections extends ListRecords
{
    protected static string $resource = AboutPageLeadershipSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = AboutPageLeadershipSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(AboutPageLeadershipSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}