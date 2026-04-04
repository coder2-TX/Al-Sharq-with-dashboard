<?php

namespace App\Filament\Resources\SectorsPageMedicinesPages\Pages;

use App\Filament\Resources\SectorsPageMedicinesPages\SectorsPageMedicinesPageResource;
use App\Models\SectorsPageMedicinesPage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicinesPage extends CreateRecord
{
    protected static string $resource = SectorsPageMedicinesPageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageMedicinesPage::query()->first();

        if ($record) {
            $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
            return;
        }

        parent::mount();
    }

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}