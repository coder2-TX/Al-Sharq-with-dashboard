<?php

namespace App\Filament\Resources\SectorsPageMedicinesPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMedicinesPartnerProducts\SectorsPageMedicinesPartnerProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicinesPartnerProducts extends ListRecords
{
    protected static string $resource = SectorsPageMedicinesPartnerProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('إضافة منتج'),
        ];
    }
}