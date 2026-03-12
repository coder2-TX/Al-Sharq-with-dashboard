<?php

namespace App\Filament\Resources\HomePageAboutSections;

use App\Filament\Resources\HomePageAboutSections\Pages;
use App\Models\HomePageAboutSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomePageAboutSectionResource extends Resource
{
    protected static ?string $model = HomePageAboutSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'الرئيسية - من نحن';

    protected static string|\UnitEnum|null $navigationGroup = 'الموقع';

    protected static ?string $modelLabel = 'من نحن';

    protected static ?string $pluralModelLabel = 'من نحن';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('المحتوى العربي')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('lead_ar')
                        ->label('النص الرئيسي بالعربية')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    Textarea::make('text_ar')
                        ->label('النص الفرعي بالعربية')
                        ->required()
                        ->rows(6)
                        ->columnSpanFull(),
                ]),

            Section::make('English Content')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('lead_en')
                        ->label('Main text in English')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),

                    Textarea::make('text_en')
                        ->label('Secondary text in English')
                        ->required()
                        ->rows(6)
                        ->columnSpanFull(),
                ]),

            Section::make('Video')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('youtube_url')
                        ->label('YouTube URL')
                        ->url()
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lead_ar')
                    ->label('العربية')
                    ->limit(80)
                    ->wrap(),

                TextColumn::make('lead_en')
                    ->label('English')
                    ->limit(80)
                    ->wrap(),

                TextColumn::make('youtube_url')
                    ->label('YouTube')
                    ->limit(50),
            ])
            ->recordUrl(fn (HomePageAboutSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomePageAboutSections::route('/'),
            'create' => Pages\CreateHomePageAboutSection::route('/create'),
            'edit' => Pages\EditHomePageAboutSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}