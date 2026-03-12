<?php

namespace App\Filament\Resources\HomePageSectorsSections\Pages;

use App\Filament\Resources\HomePageSectorsSections\HomePageSectorsSectionResource;
use App\Models\HomePageSectorsSection;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateHomePageSectorsSection extends CreateRecord
{
    protected static string $resource = HomePageSectorsSectionResource::class;

    protected static bool $canCreateAnother = false;

    public function mount(): void
    {
        $record = HomePageSectorsSection::query()->first();

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