<?php

namespace App\Filament\Resources\SectorsPageMedicalSectorSections;

use App\Filament\Resources\SectorsPageMedicalSectorSections\Pages;
use App\Models\SectorsPageMedicalSectorSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectorsPageMedicalSectorSectionResource extends Resource
{
    protected static ?string $model = SectorsPageMedicalSectorSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'صفحة القطاعات - القطاع الطبي';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'صفحة القطاعات - القطاع الطبي';

    protected static ?string $pluralModelLabel = 'صفحة القطاعات - القطاع الطبي';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('محتوى صفحة القطاع الطبي')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('hero_video')
                        ->label('الفيديو الرئيسي')
                        ->disk('public')
                        ->directory('site/sectors/medical/video')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'video/mp4',
                            'video/webm',
                            'video/ogg',
                        ])
                        ->columnSpanFull(),

                    FileUpload::make('medicines_image')
                        ->label('صورة قطاع الأدوية')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/medical')
                        ->visibility('public')
                        ->columnSpanFull(),

                    FileUpload::make('medical_supplies_image')
                        ->label('صورة قطاع المستلزمات الطبية')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/medical')
                        ->visibility('public')
                        ->columnSpanFull(),

                    FileUpload::make('milk_food_image')
                        ->label('صورة قطاع الحليب وغذاء الأطفال')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/medical')
                        ->visibility('public')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_video')
                    ->label('الفيديو الرئيسي')
                    ->formatStateUsing(fn (?string $state): string => $state ? 'موجود' : 'الافتراضي')
                    ->badge(),

                ImageColumn::make('medicines_image')
                    ->label('الأدوية')
                    ->disk('public'),

                ImageColumn::make('medical_supplies_image')
                    ->label('المستلزمات الطبية')
                    ->disk('public'),

                ImageColumn::make('milk_food_image')
                    ->label('الحليب وغذاء الأطفال')
                    ->disk('public'),
            ])
            ->recordUrl(fn (SectorsPageMedicalSectorSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageMedicalSectorSections::route('/'),
            'create' => Pages\CreateSectorsPageMedicalSectorSection::route('/create'),
            'edit' => Pages\EditSectorsPageMedicalSectorSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}