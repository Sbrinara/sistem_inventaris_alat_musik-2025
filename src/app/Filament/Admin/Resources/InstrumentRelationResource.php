<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InstrumentRelationResource\Pages;
use App\Models\InstrumentRelation;
use App\Models\Instrument;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class InstrumentRelationResource extends Resource
{
    protected static ?string $model = InstrumentRelation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Relasi Alat Musik';
    protected static ?string $pluralLabel = 'Relasi Alat Musik';
    protected static ?string $modelLabel = 'Relasi Alat Musik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('instrument_id')
                    ->label('Alat Musik')
                    ->relationship('instrument', 'name')
                    ->searchable()
                    ->required(),

                Select::make('related_instrument_id')
                    ->label('Terkait Dengan')
                    ->relationship('relatedInstrument', 'name')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('instrument.name')->label('Alat Musik'),
                TextColumn::make('relatedInstrument.name')->label('Terkait Dengan'),
                TextColumn::make('created_at')->label('Dibuat')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInstrumentRelations::route('/'),
            'create' => Pages\CreateInstrumentRelation::route('/create'),
            'edit' => Pages\EditInstrumentRelation::route('/{record}/edit'),
        ];
    }
}
