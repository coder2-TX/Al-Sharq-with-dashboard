<?php

namespace App\Filament\Resources\SectorsPagePaintsPartners;

use App\Filament\Resources\SectorsPagePaintsPartners\Pages;
use App\Models\SectorsPagePaintsPartner;
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

class SectorsPagePaintsPartnerResource extends Resource
{
    protected static ?string $model = SectorsPagePaintsPartner::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'شركاء قطاع الدهانات';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'شريك قطاع الدهانات';

    protected static ?string $pluralModelLabel = 'شركاء قطاع الدهانات';

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
                        ->directory('site/sectors/paints/partners')
                        ->visibility('public')
                        ->required()
                        ->columnSpanFull(),

                    FileUpload::make('products_hero_image')
                        ->label('صورة أول سكشن لصفحة منتجات الشريك')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/paints/partners/products-hero')
                        ->visibility('public')
                        ->columnSpanFull(),

                    TextInput::make('partner_name')
                        ->label('اسم الشريك')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('partner_url')
                        ->label('رابط صفحة الشريك')
                        ->placeholder('https://example.com')
                        ->url()
                        ->maxLength(2048)
                        ->helperText('اختياري: إذا تم إدخال الرابط سيظهر زر "انتقال لموقع الشريك" في صفحة منتجات هذا الشريك.')
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

                TextColumn::make('partner_url')
                    ->label('رابط صفحة الشريك')
                    ->formatStateUsing(fn (?string $state): string => filled($state) ? $state : '—')
                    ->url(fn (SectorsPagePaintsPartner $record): ?string => $record->partner_url ?: null)
                    ->openUrlInNewTab()
                    ->limit(40)
                    ->toggleable(),

                TextColumn::make('description_ar')
                    ->label('الوصف العربي')
                    ->limit(50),

                TextColumn::make('description_en')
                    ->label('الوصف الإنجليزي')
                    ->limit(50),
            ])
            ->recordUrl(fn (SectorsPagePaintsPartner $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPagePaintsPartners::route('/'),
            'create' => Pages\CreateSectorsPagePaintsPartner::route('/create'),
            'edit' => Pages\EditSectorsPagePaintsPartner::route('/{record}/edit'),
        ];
    }
}