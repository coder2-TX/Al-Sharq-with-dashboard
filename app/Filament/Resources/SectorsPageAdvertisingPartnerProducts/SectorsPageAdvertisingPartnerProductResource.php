<?php

namespace App\Filament\Resources\SectorsPageAdvertisingPartnerProducts;

use App\Filament\Resources\SectorsPageAdvertisingPartnerProducts\Pages;
use App\Models\SectorsPageAdvertisingPartnerProduct;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectorsPageAdvertisingPartnerProductResource extends Resource
{
    protected static ?string $model = SectorsPageAdvertisingPartnerProduct::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'المنتجات';

    protected static string|\UnitEnum|null $navigationGroup = 'قطاع الدعاية والإعلان';

    protected static ?string $modelLabel = 'منتج شريك قطاع الدعاية والإعلان';

    protected static ?string $pluralModelLabel = 'منتجات شركاء قطاع الدعاية والإعلان';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('بيانات المنتج')
                ->columnSpanFull()
                ->schema([
                    Select::make('partner_id')
                        ->label('الشريك')
                        ->relationship('partner', 'partner_name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('sort_order')
                        ->label('الترتيب')
                        ->numeric()
                        ->default(0)
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('product_image')
                        ->label('صورة المنتج')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/advertising/partner-products')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('name_ar')
                        ->label('اسم المنتج عربي')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('name_en')
                        ->label('اسم المنتج إنجليزي')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('description_ar')
                        ->label('وصف المنتج عربي')
                        ->rows(6)
                        ->columnSpanFull(),

                    Textarea::make('description_en')
                        ->label('وصف المنتج إنجليزي')
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

                TextColumn::make('partner.partner_name')
                    ->label('الشريك')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                ImageColumn::make('product_image')
                    ->label('الصورة')
                    ->disk('public'),

                TextColumn::make('name_ar')
                    ->label('الاسم عربي')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('name_en')
                    ->label('الاسم إنجليزي')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('description_ar')
                    ->label('الوصف عربي')
                    ->limit(50),

                TextColumn::make('description_en')
                    ->label('الوصف إنجليزي')
                    ->limit(50),
            ])
            ->recordUrl(fn (SectorsPageAdvertisingPartnerProduct $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageAdvertisingPartnerProducts::route('/'),
            'create' => Pages\CreateSectorsPageAdvertisingPartnerProduct::route('/create'),
            'edit' => Pages\EditSectorsPageAdvertisingPartnerProduct::route('/{record}/edit'),
        ];
    }
}