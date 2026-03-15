<?php

namespace App\Filament\Resources\ContactPageMapSections;

use App\Filament\Resources\ContactPageMapSections\Pages;
use App\Models\ContactPageMapSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactPageMapSectionResource extends Resource
{
    protected static ?string $model = ContactPageMapSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationLabel = 'السكشن الرابع - الخريطة';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة تواصل معنا';

    protected static ?string $modelLabel = 'السكشن الرابع - الخريطة';

    protected static ?string $pluralModelLabel = 'السكشن الرابع - الخريطة';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('الخريطة')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('google_maps_embed_url')
                        ->label('رابط خرائط جوجل')
                        ->helperText('يمكنك لصق رابط Google Maps العادي أو رابط Embed.')
                        ->rows(4)
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('google_maps_embed_url')
                    ->label('الرابط')
                    ->limit(90)
                    ->wrap(),
            ])
            ->recordUrl(fn (ContactPageMapSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactPageMapSections::route('/'),
            'create' => Pages\CreateContactPageMapSection::route('/create'),
            'edit' => Pages\EditContactPageMapSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}