<?php

namespace App\Filament\Resources\SectorsPageMainSections;

use App\Filament\Resources\SectorsPageMainSections\Pages;
use App\Models\SectorsPageMainSection;
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

class SectorsPageMainSectionResource extends Resource
{
    protected static ?string $model = SectorsPageMainSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'صفحة القطاعات - الجزء الرئيسي';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'صفحة القطاعات - الجزء الرئيسي';

    protected static ?string $pluralModelLabel = 'صفحة القطاعات - الجزء الرئيسي';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('محتوى صفحة القطاعات')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('hero_video')
                        ->label('الفيديو الرئيسي')
                        ->disk('public')
                        ->directory('site/sectors/page-main/video')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'video/mp4',
                            'video/webm',
                            'video/ogg',
                        ])
                        ->columnSpanFull(),

                    FileUpload::make('medical_sector_image')
                        ->label('صورة القطاع الطبي')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/page-main')
                        ->visibility('public')
                        ->columnSpanFull(),

                    FileUpload::make('commercial_sector_image')
                        ->label('صورة القطاع التجاري')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/page-main')
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

                ImageColumn::make('medical_sector_image')
                    ->label('صورة القطاع الطبي')
                    ->disk('public'),

                ImageColumn::make('commercial_sector_image')
                    ->label('صورة القطاع التجاري')
                    ->disk('public'),
            ])
            ->recordUrl(fn (SectorsPageMainSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageMainSections::route('/'),
            'create' => Pages\CreateSectorsPageMainSection::route('/create'),
            'edit' => Pages\EditSectorsPageMainSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}