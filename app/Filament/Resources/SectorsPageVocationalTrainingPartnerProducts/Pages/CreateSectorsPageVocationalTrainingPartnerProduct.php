<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPartnerProducts\Pages;

use App\Filament\Resources\SectorsPageVocationalTrainingPartnerProducts\SectorsPageVocationalTrainingPartnerProductResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateSectorsPageVocationalTrainingPartnerProduct extends CreateRecord
{
    protected static string $resource = SectorsPageVocationalTrainingPartnerProductResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}