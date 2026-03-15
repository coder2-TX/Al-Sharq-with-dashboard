<?php

namespace App\Filament\Resources\ContactPageBranches\Pages;

use App\Filament\Resources\ContactPageBranches\ContactPageBranchResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateContactPageBranch extends CreateRecord
{
    protected static string $resource = ContactPageBranchResource::class;

    public function getMaxContentWidth(): Width
    {
        return Width::Full;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}