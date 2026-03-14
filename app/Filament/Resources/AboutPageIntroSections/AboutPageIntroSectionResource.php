<?php

namespace App\Filament\Resources\AboutPageIntroSections;

use App\Filament\Resources\AboutPageIntroSections\Pages;
use App\Models\AboutPageIntroSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AboutPageIntroSectionResource extends Resource
{
    protected static ?string $model = AboutPageIntroSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'السكشن الأول - كلمة عن الشركة';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';

    protected static ?string $modelLabel = 'السكشن الأول - كلمة عن الشركة';

    protected static ?string $pluralModelLabel = 'السكشن الأول - كلمة عن الشركة';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('المحتوى العربي')
                ->columnSpanFull()
                ->schema([
                    RichEditor::make('subtitle_ar')
                        ->label('النص الفرعي بالعربية')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->required()
                        ->columnSpanFull(),

                    RichEditor::make('article_ar')
                        ->label('المقال بالعربية')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->required()
                        ->columnSpanFull(),
                ]),

            Section::make('English Content')
                ->columnSpanFull()
                ->schema([
                    RichEditor::make('subtitle_en')
                        ->label('Subtitle in English')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->required()
                        ->columnSpanFull(),

                    RichEditor::make('article_en')
                        ->label('Article in English')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subtitle_ar')
                    ->label('العربية')
                    ->html()
                    ->limit(80),

                TextColumn::make('subtitle_en')
                    ->label('English')
                    ->html()
                    ->limit(80),
            ])
            ->recordUrl(fn (AboutPageIntroSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutPageIntroSections::route('/'),
            'create' => Pages\CreateAboutPageIntroSection::route('/create'),
            'edit' => Pages\EditAboutPageIntroSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}