<?php

namespace App\Filament\Resources\SiteFooterSections\Pages;

use App\Filament\Resources\SiteFooterSections\SiteFooterSectionResource;
use App\Models\SiteFooterSection;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSiteFooterSections extends ListRecords
{
    protected static string $resource = SiteFooterSectionResource::class;

    protected function getHeaderActions(): array
    {
        $record = SiteFooterSection::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SiteFooterSectionResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}