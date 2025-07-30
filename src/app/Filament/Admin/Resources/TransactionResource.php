<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Transaksi';
    protected static ?string $modelLabel = 'Transaksi';
    protected static ?string $pluralLabel = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('instrument_id')
                    ->label('Alat Musik')
                    ->relationship('instrument', 'name')
                    ->required(),

                Select::make('type')
                    ->label('Jenis Transaksi')
                    ->options([
                        'in' => 'Masuk',
                        'out' => 'Keluar',
                    ])
                    ->required(),

                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                Select::make('previous_transaction_id')
                    ->label('Transaksi Sebelumnya')
                    ->relationship('previous', 'id')
                    ->searchable()
                    ->nullable(),

                DatePicker::make('transacted_at')
                    ->label('Tanggal Transaksi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('instrument.name')->label('Alat Musik'),
                TextColumn::make('type')->label('Tipe')->badge()->color(fn ($state) => $state === 'in' ? 'success' : 'danger'),
                TextColumn::make('quantity')->label('Jumlah'),
                TextColumn::make('transacted_at')->label('Tanggal')->date(),
                TextColumn::make('previous_transaction_id')->label('Transaksi Sebelumnya')->numeric()->sortable(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
