<?php

namespace App\Filament\Resources\AboutPageLeadershipSections;

use App\Filament\Resources\AboutPageLeadershipSections\Pages;
use App\Models\AboutPageLeadershipSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AboutPageLeadershipSectionResource extends Resource
{
    protected static ?string $model = AboutPageLeadershipSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'السكشن الرابع - قيادة الشركة';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';

    protected static ?string $modelLabel = 'السكشن الرابع - قيادة الشركة';

    protected static ?string $pluralModelLabel = 'السكشن الرابع - قيادة الشركة';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('كلمة رئيس مجلس الإدارة')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('chairman_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('chairman_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255),

                    FileUpload::make('chairman_image')
                        ->label('الصورة')
                        ->image()
                        ->disk('public')
                        ->directory('about/leadership')
                        ->required()
                        ->columnSpanFull(),

                    static::makeRichEditor('chairman_message_ar', 'الكلمة بالعربية'),

                    static::makeRichEditor('chairman_message_en', 'الكلمة بالإنجليزية'),
                ]),

            Section::make('كلمة المدير العام')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('general_manager_name_ar')
                        ->label('الاسم بالعربية')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('general_manager_name_en')
                        ->label('الاسم بالإنجليزية')
                        ->required()
                        ->maxLength(255),

                    FileUpload::make('general_manager_image')
                        ->label('الصورة')
                        ->image()
                        ->disk('public')
                        ->directory('about/leadership')
                        ->required()
                        ->columnSpanFull(),

                    static::makeRichEditor('general_manager_message_ar', 'الكلمة بالعربية'),

                    static::makeRichEditor('general_manager_message_en', 'الكلمة بالإنجليزية'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chairman_name_ar')
                    ->label('رئيس المجلس')
                    ->limit(50),

                TextColumn::make('general_manager_name_ar')
                    ->label('المدير العام')
                    ->limit(50),

                TextColumn::make('chairman_message_ar_display')
                    ->label('كلمة رئيس المجلس')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50)),

                TextColumn::make('general_manager_message_ar_display')
                    ->label('كلمة المدير العام')
                    ->formatStateUsing(fn (?string $state): string => static::previewText($state, 50)),
            ])
            ->recordUrl(fn (AboutPageLeadershipSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutPageLeadershipSections::route('/'),
            'create' => Pages\CreateAboutPageLeadershipSection::route('/create'),
            'edit' => Pages\EditAboutPageLeadershipSection::route('/{record}/edit'),
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
        return Str::limit(trim(preg_replace('/\s+/u', ' ', strip_tags((string) $state))), $limit);
    }
}