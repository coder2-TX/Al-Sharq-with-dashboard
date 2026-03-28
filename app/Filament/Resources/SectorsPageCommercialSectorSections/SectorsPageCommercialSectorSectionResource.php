<?php

namespace App\Filament\Resources\SectorsPageCommercialSectorSections;

use App\Filament\Resources\SectorsPageCommercialSectorSections\Pages;
use App\Models\SectorsPageCommercialSectorSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class SectorsPageCommercialSectorSectionResource extends Resource
{
    protected static ?string $model = SectorsPageCommercialSectorSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'صفحة القطاعات - القطاع التجاري';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'صفحة القطاعات - القطاع التجاري';

    protected static ?string $pluralModelLabel = 'صفحة القطاعات - القطاع التجاري';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('صور بطاقات القطاع التجاري')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('cars_image')
                        ->label('صورة قطاع السيارات')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/commercial')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('communications_image')
                        ->label('صورة قطاع الاتصالات')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/commercial')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('advertising_image')
                        ->label('صورة قطاع الدعاية')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/commercial')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('paints_image')
                        ->label('صورة قطاع الدهانات')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/commercial')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('vocational_training_image')
                        ->label('صورة قطاع التدريب المهني')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/commercial')
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
                ImageColumn::make('cars_image')
                    ->label('السيارات')
                    ->disk('public'),

                ImageColumn::make('communications_image')
                    ->label('الاتصالات')
                    ->disk('public'),

                ImageColumn::make('advertising_image')
                    ->label('الدعاية')
                    ->disk('public'),

                ImageColumn::make('paints_image')
                    ->label('الدهانات')
                    ->disk('public'),

                ImageColumn::make('vocational_training_image')
                    ->label('التدريب المهني')
                    ->disk('public'),
            ])
            ->recordUrl(fn (SectorsPageCommercialSectorSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageCommercialSectorSections::route('/'),
            'create' => Pages\CreateSectorsPageCommercialSectorSection::route('/create'),
            'edit' => Pages\EditSectorsPageCommercialSectorSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}