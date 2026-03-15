<?php

namespace App\Filament\Resources\ContactPageBranches\Pages;

use App\Filament\Resources\ContactPageBranches\ContactPageBranchResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContactPageBranches extends ListRecords
{
    protected static string $resource = ContactPageBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة فرع'),
        ];
    }
}