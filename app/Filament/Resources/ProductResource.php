<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Ürünler';

    protected static ?string $modelLabel = 'Ürün';

    protected static ?string $pluralModelLabel = 'Ürünler';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Ürün Bilgileri')
                ->schema([
                    Forms\Components\Select::make('category_id')
                        ->label('Kategori')
                        ->options(function () {
                            // Ana kategori altında alt kategorileri girintili göster, sadece
                            // alt kategoriler (ürünlerin gerçekten bağlanacağı yerler) seçilebilir
                            $options = [];
                            foreach (Category::topLevel()->orderBy('sort_order')->get() as $parent) {
                                foreach ($parent->children as $child) {
                                    $options[$child->id] = $parent->name . ' → ' . $child->name;
                                }
                            }
                            return $options;
                        })
                        ->searchable()
                        ->required()
                        ->helperText('Ürünün hangi alt kategoriye (örn. Rita Serisi) ait olduğunu seç.'),

                    Forms\Components\TextInput::make('code')
                        ->label('Ürün Kodu')
                        ->required()
                        ->maxLength(100)
                        ->placeholder('Örn: MTS06-1001C'),

                    Forms\Components\TextInput::make('pole')
                        ->label('Kutup / Değer')
                        ->maxLength(50)
                        ->placeholder('Örn: 1P, 2P, 3P'),

                    Forms\Components\Textarea::make('description')
                        ->label('Açıklama')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('image')
                        ->label('Ürün Görseli')
                        ->image()
                        ->directory('products')
                        ->imageEditor(),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Sıralama')
                        ->numeric()
                        ->default(0),

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

                Tables\Columns\TextColumn::make('code')
                    ->label('Kod')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('pole')
                    ->label('Kutup')
                    ->badge(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Açıklama')
                    ->limit(60)
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Alt Kategori')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('category.parent.name')
                    ->label('Ana Kategori')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Alt Kategori')
                    ->relationship('category', 'name')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
