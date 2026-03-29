<?php

namespace App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages;

use App\Filament\Resources\SectorsPageMedicalPharmacovigilancePages\Pages;
use App\Models\SectorsPageMedicalPharmacovigilancePage;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\TextColor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SectorsPageMedicalPharmacovigilancePageResource extends Resource
{
    protected static ?string $model = SectorsPageMedicalPharmacovigilancePage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationLabel = 'صفحة القطاعات - التيقظ الدوائي';

    protected static string|\UnitEnum|null $navigationGroup = 'القطاعات';

    protected static ?string $modelLabel = 'صفحة القطاعات - التيقظ الدوائي';

    protected static ?string $pluralModelLabel = 'صفحة القطاعات - التيقظ الدوائي';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('الصورة الرئيسية')
                ->columnSpanFull()
                ->schema([
                    FileUpload::make('hero_image')
                        ->label('صورة الهيرو')
                        ->image()
                        ->disk('public')
                        ->directory('site/sectors/sector-pages/medical/pharmacovigilance')
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

            Section::make('بيانات التواصل المشتركة')
                ->columnSpanFull()
                ->schema([
                    Textarea::make('report_emails')
                        ->label('البريد الإلكتروني')
                        ->helperText('ضعي كل بريد في سطر مستقل')
                        ->rows(4)
                        ->columnSpanFull(),

                    Textarea::make('report_phones')
                        ->label('أرقام الهاتف')
                        ->helperText('ضعي كل رقم في سطر مستقل')
                        ->rows(4)
                        ->columnSpanFull(),

                    TextInput::make('whatsapp_number')
                        ->label('رقم واتساب استقبال الرسائل')
                        ->tel()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('hero_image')
                    ->label('الهيرو')
                    ->disk('public'),

                TextColumn::make('whatsapp_number')
                    ->label('واتساب')
                    ->limit(30),

                TextColumn::make('report_emails')
                    ->label('البريد الإلكتروني')
                    ->limit(50),
            ])
            ->recordUrl(fn (SectorsPageMedicalPharmacovigilancePage $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectorsPageMedicalPharmacovigilancePages::route('/'),
            'create' => Pages\CreateSectorsPageMedicalPharmacovigilancePage::route('/create'),
            'edit' => Pages\EditSectorsPageMedicalPharmacovigilancePage::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}