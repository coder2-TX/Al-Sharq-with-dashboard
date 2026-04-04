<?php

namespace App\Filament\Resources\SectorsPageMedicinesPartners\Pages;

use App\Filament\Resources\SectorsPageMedicinesPartners\SectorsPageMedicinesPartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSectorsPageMedicinesPartners extends ListRecords
{
    protected static string $resource = SectorsPageMedicinesPartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('إضافة شريك'),
        ];
    }
}