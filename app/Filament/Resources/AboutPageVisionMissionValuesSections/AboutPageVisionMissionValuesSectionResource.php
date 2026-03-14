<?php

namespace App\Filament\Resources\AboutPageVisionMissionValuesSections;

use App\Filament\Resources\AboutPageVisionMissionValuesSections\Pages;
use App\Models\AboutPageVisionMissionValuesSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AboutPageVisionMissionValuesSectionResource extends Resource
{
    protected static ?string $model = AboutPageVisionMissionValuesSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-eye';

    protected static ?string $navigationLabel = 'السكشن الثالث - الرؤية والرسالة والقيم';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';

    protected static ?string $modelLabel = 'السكشن الثالث - الرؤية والرسالة والقيم';

    protected static ?string $pluralModelLabel = 'السكشن الثالث - الرؤية والرسالة والقيم';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('بطاقة رؤيتنا')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    static::makeRichEditor('vision_text_ar', 'النص العربي'),
                    static::makeRichEditor('vision_text_en', 'النص الإنجليزي'),
                ]),

            Section::make('بطاقة رسالتنا')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    static::makeRichEditor('mission_text_ar', 'النص العربي'),
                    static::makeRichEditor('mission_text_en', 'النص الإنجليزي'),
                ]),

            Section::make('بطاقة قيمنا')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    static::makeRichEditor('values_text_ar', 'النص العربي'),
                    static::makeRichEditor('values_text_en', 'النص الإنجليزي'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('vision_text_ar_display')
                    ->label('الرؤية')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),

                TextColumn::make('mission_text_ar_display')
                    ->label('الرسالة')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),

                TextColumn::make('values_text_ar_display')
                    ->label('القيم')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50))
                    ->wrap(),
            ])
            ->recordUrl(fn (AboutPageVisionMissionValuesSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutPageVisionMissionValuesSections::route('/'),
            'create' => Pages\CreateAboutPageVisionMissionValuesSection::route('/create'),
            'edit' => Pages\EditAboutPageVisionMissionValuesSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }

    protected static function makeRichEditor(string $name, string $label): RichEditor
    {
        return RichEditor::make($name)
            ->label($label)
            ->toolbarButtons([
                ['bold', 'italic', 'underline', 'strike', 'textColor', 'clearFormatting'],
                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                ['blockquote', 'bulletList', 'orderedList', 'link'],
                ['undo', 'redo'],
            ])
            ->textColors(TextColor::getDefaults())
            ->customTextColors()
            ->required()
            ->columnSpanFull();
    }

    protected static function previewText(?string $state, int $limit = 50): string
    {
        $text = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $state)));

        return Str::limit($text, $limit);
    }
}