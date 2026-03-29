<?php

namespace App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\Pages;

use App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\SectorsPageMedicalPharmacovigilancePageResource;
use App\Models\SectorsPageMedicalPharmacovigilancePage;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageMedicalPharmacovigilancePage extends CreateRecord
{
    protected static string $resource = SectorsPageMedicalPharmacovigilancePageResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = SectorsPageMedicalPharmacovigilancePage::query()->first();

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