<?php

namespace App\Filament\Resources\SectorsPageMedicinesPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageMedicinesPartnerProducts\SectorsPageMedicinesPartnerProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMedicinesPartnerProduct extends EditRecord
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

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}