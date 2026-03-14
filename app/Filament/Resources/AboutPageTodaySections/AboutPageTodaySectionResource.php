<?php

namespace App\Filament\Resources\AboutPageTodaySections;

use App\Filament\Resources\AboutPageTodaySections\Pages;
use App\Models\AboutPageTodaySection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AboutPageTodaySectionResource extends Resource
{
    protected static ?string $model = AboutPageTodaySection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationLabel = 'السكشن السادس - شركة الشرق اليوم';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';

    protected static ?string $modelLabel = 'السكشن السادس - شركة الشرق اليوم';

    protected static ?string $pluralModelLabel = 'السكشن السادس - شركة الشرق اليوم';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('النص الفرعي')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    FileUpload::make('image')
                        ->label('الصورة')
                        ->image()
                        ->disk('public')
                        ->directory('about/today')
                        ->columnSpanFull(),

                    RichEditor::make('subtitle_ar')
                        ->label('النص العربي')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->customTextColors()
                        ->required()
                        ->columnSpanFull(),

                    RichEditor::make('subtitle_en')
                        ->label('النص الإنجليزي')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->customTextColors()
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->disk('public')
                    ->square(),

                TextColumn::make('subtitle_ar_display')
                    ->label('العربية')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),

                TextColumn::make('subtitle_en_display')
                    ->label('English')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),
            ])
            ->recordUrl(fn (AboutPageTodaySection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutPageTodaySections::route('/'),
            'create' => Pages\CreateAboutPageTodaySection::route('/create'),
            'edit' => Pages\EditAboutPageTodaySection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }

    protected static function previewText(?string $state, int $limit = 50): string
    {
        return Str::limit(trim(preg_replace('/\s+/u', ' ', strip_tags((string) $state))), $limit);
    }
}