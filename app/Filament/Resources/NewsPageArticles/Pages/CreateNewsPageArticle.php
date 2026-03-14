<?php

namespace App\Filament\Resources\NewsPageArticles\Pages;

use App\Filament\Resources\NewsPageArticles\NewsPageArticleResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Width;

class CreateNewsPageArticle extends CreateRecord
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
}