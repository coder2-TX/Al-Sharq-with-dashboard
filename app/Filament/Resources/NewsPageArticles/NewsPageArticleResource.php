<?php

namespace App\Filament\Resources\NewsPageArticles;

use App\Filament\Resources\NewsPageArticles\Pages;
use App\Models\NewsPageArticle;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NewsPageArticleResource extends Resource
{
    protected static ?string $model = NewsPageArticle::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'صفحة الأخبار - الأخبار';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة الأخبار';

    protected static ?string $modelLabel = 'خبر';

    protected static ?string $pluralModelLabel = 'أخبار الصفحة';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('البيانات الأساسية')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    DatePicker::make('published_at')
                        ->label('تاريخ الخبر')
                        ->required(),

                    FileUpload::make('image')
                        ->label('صورة الخبر')
                        ->image()
                        ->disk('public')
                        ->directory('news/articles')
                        ->columnSpanFull(),

                    Textarea::make('title_ar')
                        ->label('عنوان الخبر بالعربية')
                        ->rows(3)
                        ->required()
                        ->columnSpanFull(),

                    Textarea::make('title_en')
                        ->label('News title in English')
                        ->rows(3)
                        ->required()
                        ->columnSpanFull(),
                ]),

            Section::make('وصف الخبر')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    static::makeRichEditor('description_ar', 'الوصف بالعربية'),
                    static::makeRichEditor('description_en', 'Description in English'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->disk('public')
                    ->square(),

                TextColumn::make('published_at')
                    ->label('التاريخ')
                    ->date('M d, Y')
                    ->sortable(),

                TextColumn::make('title_ar')
                    ->label('العنوان العربي')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),

                TextColumn::make('title_en')
                    ->label('English Title')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),
            ])
            ->recordUrl(fn (NewsPageArticle $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsPageArticles::route('/'),
            'create' => Pages\CreateNewsPageArticle::route('/create'),
            'edit' => Pages\EditNewsPageArticle::route('/{record}/edit'),
        ];
    }

    protected static function makeRichEditor(string $name, string $label): RichEditor
    {
        return RichEditor::make($name)
            ->label($label)
            ->toolbarButtons([
                ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                ['blockquote', 'bulletList', 'orderedList', 'link'],
                ['undo', 'redo'],
            ])
            ->textColors(TextColor::getDefaults())
            ->customTextColors()
            ->required()
            ->columnSpanFull();
    }

    protected static function previewText(?string $state, int $limit = 50): string
    {
        return Str::limit(trim(preg_replace('/\s+/u', ' ', strip_tags((string) $state))), $limit);
    }
}