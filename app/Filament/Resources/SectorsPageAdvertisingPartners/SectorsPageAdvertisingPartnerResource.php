<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartners;

use App\Filament\Resources\SectorsPageAdvertisingPartners\Pages;
use App\Models\SectorsPageAdvertisingPartner;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectorsPageAdvertisingPartnerResource extends Resource
{
    protected static ?string $model = SectorsPageAdvertisingPartner::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'شركاء قطاع الإعلانات';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'شريك قطاع الإعلانات';

    protected static ?string $pluralModelLabel = 'شركاء قطاع الإعلانات';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('بيانات الشريك')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('sort_order')
                        ->label('الترتيب')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('partner_image')
                        ->label('صورة الشريك')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/advertising/partners')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('products_hero_image')
                        ->label('صورة أول سكشن لصفحة منتجات الشريك')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/advertising/partners/products-hero')
                        ->visibility('public')
                        ->columnSpanFull(),

                    TextInput::make('partner_name')
                        ->label('اسم الشريك')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('description_ar')
                        ->label('الوصف العربي')
                        ->rows(6)
                        ->columnSpanFull(),

                    Textarea::make('description_en')
                        ->label('الوصف الإنجليزي')
                        ->rows(6)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->label('الترتيب'),

                ImageColumn::make('partner_image')
                    ->label('صورة الشريك')
                    ->disk('public'),

                ImageColumn::make('products_hero_image')
                    ->label('صورة الهيرو')
                    ->disk('public'),

                TextColumn::make('partner_name')
                    ->label('الاسم')
                    ->limit(50),

                TextColumn::make('description_ar')
                    ->label('الوصف العربي')
                    ->limit(50),

                TextColumn::make('description_en')
                    ->label('الوصف الإنجليزي')
                    ->limit(50),
            ])
            ->recordUrl(fn (SectorsPageAdvertisingPartner $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageAdvertisingPartners::route('/'),
            'create' => Pages\CreateSectorsPageAdvertisingPartner::route('/create'),
            'edit' => Pages\EditSectorsPageAdvertisingPartner::route('/{record}/edit'),
        ];
    }
}