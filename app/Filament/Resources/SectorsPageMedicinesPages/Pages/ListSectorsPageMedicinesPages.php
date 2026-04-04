<?php

namespace App\Filament\Resources\SectorsPageMedicinesPages\Pages;

use App\Filament\Resources\SectorsPageMedicinesPages\SectorsPageMedicinesPageResource;
use App\Models\SectorsPageMedicinesPage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicinesPages extends ListRecords
{
    protected static string $resource = SectorsPageMedicinesPageResource::class;

    protected function getHeaderActions(): array
    {
        $record = SectorsPageMedicinesPage::query()->first();

        if ($record) {
            return [
                Action::make('edit')
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square')
                    ->url(SectorsPageMedicinesPageResource::getUrl('edit', ['record' => $record])),
            ];
        }

        return [
            CreateAction::make()
                ->label('إضافة المحتوى'),
        ];
    }
}