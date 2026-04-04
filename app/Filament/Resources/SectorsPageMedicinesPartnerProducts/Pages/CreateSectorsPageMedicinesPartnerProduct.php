<?php

namespace App\Filament\Resources\SectorsPageMedicinesPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMedicinesPartnerProducts\SectorsPageMedicinesPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicinesPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageMedicinesPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}