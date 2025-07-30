<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InstrumentResource\Pages;
use App\Filament\Admin\Resources\InstrumentResource\RelationManagers;
use App\Models\Instrument;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstrumentResource extends Resource
{
    protected static ?string $model = Instrument::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nama Alat Musik')
                ->required(),

            TextInput::make('brand')
                ->label('Merek')
                ->required(),

            TextInput::make('stock')
                ->label('Stok')
                ->numeric()
                ->minValue(0)
                ->required(),

            Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->searchable()
                ->preload()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Alat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('brand')->label('Merek')->sortable()->searchable(), // 👈 tambahkan ini
                Tables\Columns\TextColumn::make('stock')->label('Stok'),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstruments::route('/'),
            'create' => Pages\CreateInstrument::route('/create'),
            'edit' => Pages\EditInstrument::route('/{record}/edit'),
        ];
    }
}
