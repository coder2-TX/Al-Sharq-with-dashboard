<?php

namespace App\Filament\Resources\SectorsPageMedicinesPages\Pages;

use App\Filament\Resources\SectorsPageMedicinesPages\SectorsPageMedicinesPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditSectorsPageMedicinesPage extends EditRecord
{
    protected static string $resource = SectorsPageMedicinesPageResource::class;

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