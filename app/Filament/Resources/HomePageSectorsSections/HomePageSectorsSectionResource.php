<?php

namespace App\Filament\Resources\HomePageSectorsSections;

use App\Filament\Resources\HomePageSectorsSections\Pages;
use App\Models\HomePageSectorsSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomePageSectorsSectionResource extends Resource
{
    protected static ?string $model = HomePageSectorsSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'الرئيسية - القطاعات';

    protected static string|\UnitEnum|null $navigationGroup = 'الموقع';

    protected static ?string $modelLabel = 'سكشن القطاعات';

    protected static ?string $pluralModelLabel = 'سكشن القطاعات';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('القطاع الأول')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('first_sector_name_ar')
                        ->label('اسم القطاع بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('first_sector_name_en')
                        ->label('اسم القطاع بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    FileUpload::make('first_sector_image')
                        ->label('الصورة')
                        ->image()
                        ->disk('public')
                        ->directory('site/home/sectors')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),
                ]),

            Section::make('القطاع الثاني')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('second_sector_name_ar')
                        ->label('اسم القطاع بالعربية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('second_sector_name_en')
                        ->label('اسم القطاع بالإنجليزية')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    FileUpload::make('second_sector_image')
                        ->label('الصورة')
                        ->image()
                        ->disk('public')
                        ->directory('site/home/sectors')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_sector_name_ar')
                    ->label('القطاع الأول')
                    ->limit(40),

                TextColumn::make('second_sector_name_ar')
                    ->label('القطاع الثاني')
                    ->limit(40),
            ])
            ->recordUrl(fn (HomePageSectorsSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomePageSectorsSections::route('/'),
            'create' => Pages\CreateHomePageSectorsSection::route('/create'),
            'edit' => Pages\EditHomePageSectorsSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}