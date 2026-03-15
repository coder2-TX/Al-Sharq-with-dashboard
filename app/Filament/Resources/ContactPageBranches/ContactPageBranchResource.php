<?php

namespace App\Filament\Resources\ContactPageBranches;

use App\Filament\Resources\ContactPageBranches\Pages;
use App\Models\ContactPageBranch;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactPageBranchResource extends Resource
{
    protected static ?string $model = ContactPageBranch::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'صفحة تواصل معنا - الفروع';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة تواصل معنا';

    protected static ?string $modelLabel = 'فرع';

    protected static ?string $pluralModelLabel = 'فروع صفحة التواصل';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('اسم الفرع')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('name_ar')
                        ->label('اسم الفرع بالعربية')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('name_en')
                        ->label('Branch name in English')
                        ->required()
                        ->maxLength(255),
                ]),

            Section::make('بيانات التواصل')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('email')
                        ->label('الإيميل')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('phone')
                        ->label('الهاتف')
                        ->tel()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('whatsapp_number')
                        ->label('رقم واتساب استقبال الرسائل')
                        ->tel()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('sort_order')
                        ->label('ترتيب الظهور')
                        ->numeric()
                        ->required()
                        ->default(fn () => ((int) ContactPageBranch::query()->max('sort_order')) + 1),

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
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name_ar')
                    ->label('الفرع العربي')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('name_en')
                    ->label('Branch English')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('phone')
                    ->label('الهاتف')
                    ->limit(50),

                TextColumn::make('whatsapp_number')
                    ->label('واتساب')
                    ->limit(50),
            ])
            ->recordUrl(fn (ContactPageBranch $record): string => static::getUrl('edit', ['record' => $record]))
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactPageBranches::route('/'),
            'create' => Pages\CreateContactPageBranch::route('/create'),
            'edit' => Pages\EditContactPageBranch::route('/{record}/edit'),
        ];
    }
}