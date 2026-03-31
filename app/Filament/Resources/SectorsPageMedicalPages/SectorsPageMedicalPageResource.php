<?php

namespace App\Filament\Resources\SectorsPageMedicalPages;

use App\Filament\Resources\SectorsPageMedicalPages\Pages;
use App\Models\SectorsPageMedicalPage;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectorsPageMedicalPageResource extends Resource
{
    protected static ?string $model = SectorsPageMedicalPage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'صفحة القطاع الطبي';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'صفحة القطاع الطبي';

    protected static ?string $pluralModelLabel = 'صفحة القطاع الطبي';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('الصورة الرئيسية')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('hero_image')
                        ->label('الصورة الرئيسية')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/sector-pages/medical')
                        ->visibility('public')
                        ->columnSpanFull(),
                ]),

            Section::make('النص التعريفي')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    RichEditor::make('article_ar')
                        ->label('النص العربي')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->customTextColors()
                        ->columnSpanFull(),

                    RichEditor::make('article_en')
                        ->label('النص الإنجليزي')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList', 'link'],
                            ['undo', 'redo'],
                        ])
                        ->textColors(TextColor::getDefaults())
                        ->customTextColors()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('hero_image')
                    ->label('الصورة الرئيسية')
                    ->disk('public'),

                TextColumn::make('article_ar')
                    ->label('العربية')
                    ->html()
                    ->limit(80),

                TextColumn::make('article_en')
                    ->label('English')
                    ->html()
                    ->limit(80),
            ])
            ->recordUrl(fn (SectorsPageMedicalPage $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageMedicalPages::route('/'),
            'create' => Pages\CreateSectorsPageMedicalPage::route('/create'),
            'edit' => Pages\EditSectorsPageMedicalPage::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}