<?php

namespace App\Filament\Resources\NewsPageArticles\Pages;

use App\Filament\Resources\NewsPageArticles\NewsPageArticleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\Width;

class EditNewsPageArticle extends EditRecord
{
    protected static string $resource = NewsPageArticleResource::class;

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