<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kategoriler';

    protected static ?string $modelLabel = 'Kategori';

    protected static ?string $pluralModelLabel = 'Kategoriler';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Kategori Bilgileri')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Kategori Adı')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $context, $state, callable $set) =>
                            $context === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                        ),

                    Forms\Components\TextInput::make('slug')
                        ->label('Adres (slug)')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->helperText('Sitede /urunler/... şeklinde görünecek adres. Otomatik oluşur, istersen değiştir.'),

                    Forms\Components\Select::make('parent_id')
                        ->label('Üst Kategori')
                        ->relationship('parent', 'name')
                        ->searchable()
                        ->preload()
                        ->helperText('Boş bırakırsan bu bir ANA kategori (örn. "Şalt Ürünleri") olur. Seçersen onun ALT kategorisi (örn. "Otomatik Sigortalar") olur.'),

                    Forms\Components\FileUpload::make('image')
                        ->label('Görsel')
                        ->image()
                        ->directory('categories')
                        ->imageEditor(),

                    Forms\Components\Textarea::make('description')
                        ->label('Açıklama')
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Sıralama')
                        ->numeric()
                        ->default(0)
                        ->helperText('Küçük sayı önce gösterilir'),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Sitede görünsün')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Ad')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Üst Kategori')
                    ->badge()
                    ->placeholder('— Ana Kategori —'),

                Tables\Columns\TextColumn::make('products_count')
                    ->label('Ürün Sayısı')
                    ->counts('products')
                    ->badge()
                    ->color('success'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Sıra')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Üst Kategori')
                    ->relationship('parent', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
