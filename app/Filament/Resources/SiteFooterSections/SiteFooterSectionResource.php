<?php

namespace App\Filament\Resources\SiteFooterSections;

use App\Filament\Resources\SiteFooterSections\Pages;
use App\Models\SiteFooterSection;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteFooterSectionResource extends Resource
{
    protected static ?string $model = SiteFooterSection::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bars-3-bottom-right';

    protected static ?string $navigationLabel = 'الفوتر';

    protected static string|\UnitEnum|null $navigationGroup = 'الإعدادات العامة';

    protected static ?string $modelLabel = 'الفوتر';

    protected static ?string $pluralModelLabel = 'الفوتر';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('روابط التواصل الاجتماعي')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('whatsapp_number')
                        ->label('رقم الواتساب')
                        ->tel()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('facebook_url')
                        ->label('رابط فيسبوك')
                        ->url()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('instagram_url')
                        ->label('رابط انستجرام')
                        ->url()
                        ->required()
                        ->maxLength(255),
                ]),

            Section::make('بيانات التواصل العامة')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('phone')
                        ->label('رقم الهاتف')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('البريد الإلكتروني')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    Textarea::make('address_ar')
                        ->label('العنوان بالعربية')
                        ->rows(3)
                        ->required()
                        ->columnSpanFull(),

                    Textarea::make('address_en')
                        ->label('Address in English')
                        ->rows(3)
                        ->required()
                        ->columnSpanFull(),
                ]),

            Section::make('وصف الروابط السريعة')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    Textarea::make('home_description_ar')
                        ->label('وصف الرئيسية بالعربية')
                        ->rows(3)
                        ->required(),

                    Textarea::make('home_description_en')
                        ->label('Home description in English')
                        ->rows(3)
                        ->required(),

                    Textarea::make('about_description_ar')
                        ->label('وصف عن الشركة بالعربية')
                        ->rows(3)
                        ->required(),

                    Textarea::make('about_description_en')
                        ->label('About description in English')
                        ->rows(3)
                        ->required(),

                    Textarea::make('news_description_ar')
                        ->label('وصف الأخبار بالعربية')
                        ->rows(3)
                        ->required(),

                    Textarea::make('news_description_en')
                        ->label('News description in English')
                        ->rows(3)
                        ->required(),

                    Textarea::make('sectors_description_ar')
                        ->label('وصف القطاعات بالعربية')
                        ->rows(3)
                        ->required(),

                    Textarea::make('sectors_description_en')
                        ->label('Sectors description in English')
                        ->rows(3)
                        ->required(),

                    Textarea::make('contact_description_ar')
                        ->label('وصف اتصل بنا بالعربية')
                        ->rows(3)
                        ->required(),

                    Textarea::make('contact_description_en')
                        ->label('Contact description in English')
                        ->rows(3)
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phone')
                    ->label('الهاتف')
                    ->limit(50),

                TextColumn::make('email')
                    ->label('البريد')
                    ->limit(50),

                TextColumn::make('home_description_ar')
                    ->label('وصف الرئيسية')
                    ->limit(50)
                    ->wrap(),
            ])
            ->recordUrl(fn (SiteFooterSection $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteFooterSections::route('/'),
            'create' => Pages\CreateSiteFooterSection::route('/create'),
            'edit' => Pages\EditSiteFooterSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return static::getModel()::query()->count() === 0;
    }
}