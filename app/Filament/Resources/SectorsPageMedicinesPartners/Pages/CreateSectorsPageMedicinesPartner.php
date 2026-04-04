<?php

namespace App\Filament\Resources\SectorsPageMedicinesPartners\Pages;

use App\Filament\Resources\SectorsPageMedicinesPartners\SectorsPageMedicinesPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicinesPartner extends CreateRecord
{
    protected static string $resource = SectorsPageMedicinesPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}