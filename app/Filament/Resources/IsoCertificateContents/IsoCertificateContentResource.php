<?php

namespace App\Filament\Resources\IsoCertificateContents;

use App\Filament\Resources\IsoCertificateContents\Pages;
use App\Models\IsoCertificateContent;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IsoCertificateContentResource extends Resource
{
    protected static ?string $model = IsoCertificateContent::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationLabel = 'الشهادة - المحتوى المشترك';

    protected static string|\UnitEnum|null $navigationGroup = 'الموقع';

    protected static ?string $modelLabel = 'محتوى الشهادة';

    protected static ?string $pluralModelLabel = 'محتوى الشهادة';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Shared Certificate Data')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('certificate_short')
                        ->label('اختصار الشهادة')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('certificate_name')
                        ->label('اسم الشهادة')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                ]),

            Section::make('Certificate Images')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('certificate_icon')
                        ->label('أيقونة الشهادة')
                        ->image()
                        ->disk('public')
                        ->directory('site/certificates/icons')
                        ->visibility('public')
                        ->columnSpanFull(),

                    FileUpload::make('certificate_image')
                        ->label('صورة الشهادة')
                        ->image()
                        ->disk('public')
                        ->directory('site/certificates/images')
                        ->visibility('public')
                        ->columnSpanFull(),
                ]),

            Section::make('المحتوى العربي')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('description_ar')
                        ->label('وصف الشهادة بالعربية')
                        ->required()
                        ->rows(5)
                        ->columnSpanFull(),
                ]),

            Section::make('English Content')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('description_en')
                        ->label('Certificate description in English')
                        ->required()
                        ->rows(5)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('certificate_short')
                    ->label('الاختصار')
                    ->limit(40),

                TextColumn::make('certificate_name')
                    ->label('اسم الشهادة')
                    ->limit(80),

                TextColumn::make('description_ar')
                    ->label('الوصف العربي')
                    ->limit(90)
                    ->wrap(),
            ])
            ->recordUrl(fn (IsoCertificateContent $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIsoCertificateContents::route('/'),
            'create' => Pages\CreateIsoCertificateContent::route('/create'),
            'edit' => Pages\EditIsoCertificateContent::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}