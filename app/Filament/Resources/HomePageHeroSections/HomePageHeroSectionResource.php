<?php

namespace App\Filament\Resources\HomePageHeroSections;

use App\Filament\Resources\HomePageHeroSections\Pages;
use App\Models\HomePageHeroSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomePageHeroSectionResource extends Resource
{
    protected static ?string $model = HomePageHeroSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationLabel = 'الرئيسية - الهيرو';

    protected static string|\UnitEnum|null $navigationGroup = 'الموقع';

    protected static ?string $modelLabel = 'هيرو الرئيسية';

    protected static ?string $pluralModelLabel = 'هيرو الرئيسية';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('النص الفرعي للهيرو')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('subtitle_ar')
                        ->label('النص الفرعي بالعربية')
                        ->required()
                        ->rows(6)
                        ->columnSpanFull(),

                    Textarea::make('subtitle_en')
                        ->label('النص الفرعي بالإنجليزية')
                        ->required()
                        ->rows(6)
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
                    ->limit(100)
                    ->wrap(),

                TextColumn::make('subtitle_en')
                    ->label('الإنجليزية')
                    ->limit(100)
                    ->wrap(),
            ])
            ->recordUrl(fn (HomePageHeroSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomePageHeroSections::route('/'),
            'create' => Pages\CreateHomePageHeroSection::route('/create'),
            'edit' => Pages\EditHomePageHeroSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}