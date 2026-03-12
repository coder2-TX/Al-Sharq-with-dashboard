<?php

namespace App\Filament\Resources\HomePageNumbersSections;

use App\Filament\Resources\HomePageNumbersSections\Pages;
use App\Models\HomePageNumbersSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomePageNumbersSectionResource extends Resource
{
    protected static ?string $model = HomePageNumbersSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationLabel = 'الرئيسية - الأرقام';

    protected static string|\UnitEnum|null $navigationGroup = 'الموقع';

    protected static ?string $modelLabel = 'سكشن الأرقام';

    protected static ?string $pluralModelLabel = 'سكشن الأرقام';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('الفقرة الأولى')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('item_1_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_1_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_1_number')
                        ->label('الرقم')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),

            Section::make('الفقرة الثانية')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('item_2_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_2_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_2_number')
                        ->label('الرقم')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),

            Section::make('الفقرة الثالثة')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('item_3_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_3_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_3_number')
                        ->label('الرقم')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),

            Section::make('الفقرة الرابعة')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('item_4_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_4_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_4_number')
                        ->label('الرقم')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),

            Section::make('الفقرة الخامسة')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('item_5_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_5_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_5_number')
                        ->label('الرقم')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),

            Section::make('الفقرة السادسة')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('item_6_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_6_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('item_6_number')
                        ->label('الرقم')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item_1_name_ar')
                    ->label('الفقرة الأولى')
                    ->limit(40),

                TextColumn::make('item_1_number')
                    ->label('رقم 1'),

                TextColumn::make('item_2_name_ar')
                    ->label('الفقرة الثانية')
                    ->limit(40),

                TextColumn::make('item_2_number')
                    ->label('رقم 2'),
            ])
            ->recordUrl(fn (HomePageNumbersSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomePageNumbersSections::route('/'),
            'create' => Pages\CreateHomePageNumbersSection::route('/create'),
            'edit' => Pages\EditHomePageNumbersSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}