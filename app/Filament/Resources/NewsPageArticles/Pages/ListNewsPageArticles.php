<?php

namespace App\Filament\Resources\NewsPageArticles\Pages;

use App\Filament\Resources\NewsPageArticles\NewsPageArticleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNewsPageArticles extends ListRecords
{
    protected static string $resource = NewsPageArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة خبر'),
        ];
    }
}