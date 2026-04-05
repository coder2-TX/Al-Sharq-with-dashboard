<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPartners\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPartners\SectorsPageVocationalTrainingPartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageVocationalTrainingPartner extends CreateRecord
{
    protected static string $resource = SectorsPageVocationalTrainingPartnerResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}