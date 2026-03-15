<?php

namespace App\Filament\Resources\ContactPageAdditionalInfoSections;

use App\Filament\Resources\ContactPageAdditionalInfoSections\Pages;
use App\Models\ContactPageAdditionalInfoSection;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactPageAdditionalInfoSectionResource extends Resource
{
    protected static ?string $model = ContactPageAdditionalInfoSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'السكشن الثالث - معلومات التواصل العامة';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة تواصل معنا';

    protected static ?string $modelLabel = 'السكشن الثالث - معلومات التواصل العامة';

    protected static ?string $pluralModelLabel = 'السكشن الثالث - معلومات التواصل العامة';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('أرقام الهاتف العامة')
                ->columnSpanFull()
                ->schema([
                    Repeater::make('phones')
                        ->label('الهواتف')
                        ->addActionLabel('إضافة هاتف')
                        ->schema([
                            TextInput::make('value')
                                ->label('رقم الهاتف')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->defaultItems(0)
                        ->columnSpanFull(),
                ]),

            Section::make('الإيميلات العامة')
                ->columnSpanFull()
                ->schema([
                    Repeater::make('emails')
                        ->label('الإيميلات')
                        ->addActionLabel('إضافة إيميل')
                        ->schema([
                            TextInput::make('value')
                                ->label('الإيميل')
                                ->email()
                                ->required()
                                ->maxLength(255),
                        ])
                        ->defaultItems(0)
                        ->columnSpanFull(),
                ]),

            Section::make('المواقع العامة')
                ->columnSpanFull()
                ->schema([
                    Repeater::make('addresses')
                        ->label('المواقع')
                        ->addActionLabel('إضافة موقع')
                        ->schema([
                            Textarea::make('address_ar')
                                ->label('الموقع بالعربية')
                                ->rows(3)
                                ->required()
                                ->columnSpanFull(),

                            Textarea::make('address_en')
                                ->label('Location in English')
                                ->rows(3)
                                ->required()
                                ->columnSpanFull(),
                        ])
                        ->defaultItems(0)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phones')
                    ->label('الهواتف')
                    ->formatStateUsing(fn (?array $state): string => count($state ?? []) . ' عناصر'),

                TextColumn::make('emails')
                    ->label('الإيميلات')
                    ->formatStateUsing(fn (?array $state): string => count($state ?? []) . ' عناصر'),

                TextColumn::make('addresses')
                    ->label('المواقع')
                    ->formatStateUsing(fn (?array $state): string => count($state ?? []) . ' عناصر'),
            ])
            ->recordUrl(fn (ContactPageAdditionalInfoSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactPageAdditionalInfoSections::route('/'),
            'create' => Pages\CreateContactPageAdditionalInfoSection::route('/create'),
            'edit' => Pages\EditContactPageAdditionalInfoSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}