<?php

namespace App\Filament\Resources\PartnerLogos;

use App\Filament\Resources\PartnerLogos\Pages;
use App\Models\PartnerLogo;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnerLogoResource extends Resource
{
    protected static ?string $model = PartnerLogo::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'الرئيسية - الشركاء';

    protected static string|\UnitEnum|null $navigationGroup = 'الموقع';

    protected static ?string $modelLabel = 'شعار شريك';

    protected static ?string $pluralModelLabel = 'شعارات الشركاء';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('بيانات الشعار')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('image_path')
                        ->label('صورة الشريك')
                        ->disk('public')
                        ->directory('site/partners')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'image/jpeg',
                            'image/png',
                            'image/svg+xml',
                            'image/webp',
                            'image/gif',
                            'image/avif',
                        ])
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('sort_order')
                        ->label('الترتيب')
                        ->numeric()
                        ->required()
                        ->minValue(1)
                        ->default(fn (): int => ((int) PartnerLogo::max('sort_order')) + 1)
                        ->inputMode('numeric')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('image_url')
                    ->label('الشعار')
                    ->square(false)
                    ->height(60),

                TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->sortable(),

                TextColumn::make('image_path')
                    ->label('المسار')
                    ->limit(50),
            ])
            ->recordUrl(fn (PartnerLogo $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnerLogos::route('/'),
            'create' => Pages\CreatePartnerLogo::route('/create'),
            'edit' => Pages\EditPartnerLogo::route('/{record}/edit'),
        ];
    }
}