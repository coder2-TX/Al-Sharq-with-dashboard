<?php

namespace App\Filament\Resources\SectorsPageVocationalTrainingPages;

use App\Filament\Resources\SectorsPageVocationalTrainingPages\Pages;
use App\Models\SectorsPageVocationalTrainingPage;
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
use Illuminate\Support\Str;

class SectorsPageVocationalTrainingPageResource extends Resource
{
    protected static ?string $model = SectorsPageVocationalTrainingPage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'الصفحة الرئيسية';

    protected static string|\UnitEnum|null $navigationGroup = 'قطاع التدريب المهني';

    protected static ?string $modelLabel = 'صفحة قطاع التدريب المهني';

    protected static ?string $pluralModelLabel = 'صفحة قطاع التدريب المهني';

    protected static ?int $navigationSort = 1;

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
                        ->directory('site/sectors/sector-pages/vocational-training')
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
                    ->formatStateUsing(fn (?string $state): string => Str::limit(trim(strip_tags($state ?? '')), 60))
                    ->tooltip(fn (?SectorsPageVocationalTrainingPage $record): string => trim(strip_tags($record?->article_ar ?? ''))),

                TextColumn::make('article_en')
                    ->label('English')
                    ->formatStateUsing(fn (?string $state): string => Str::limit(trim(strip_tags($state ?? '')), 60))
                    ->tooltip(fn (?SectorsPageVocationalTrainingPage $record): string => trim(strip_tags($record?->article_en ?? ''))),
            ])
            ->recordUrl(fn (SectorsPageVocationalTrainingPage $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageVocationalTrainingPages::route('/'),
            'create' => Pages\CreateSectorsPageVocationalTrainingPage::route('/create'),
            'edit' => Pages\EditSectorsPageVocationalTrainingPage::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}