<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

use Filament\Tables\Columns\ToggleColumn;
 


class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_motorcycle')
                    ->required()
                    ->numeric(),

                ToggleButtons::make('status')
                    ->options([
                        'booked' => 'Booked',
                        'done' => 'Done',
                        'cancelled' => 'Cancelled'
                    ])
                    ->icons([
                        'booked' => 'heroicon-o-arrow-path',
                        'done' => 'heroicon-o-check-badge',
                        'cancelled' => 'heroicon-o-x-circle',
                    ]),

                    DatePicker::make('rental_date')
                    ->required()
                    ->native(false),

                    DatePicker::make('return_date')
                    ->required()
                    ->native(false),

                    Select::make('location')
                    ->options([
                        'malang' => 'Malang',
                        'surabaya' => 'Surabaya',
                        'bali' => 'Bali',
                    ])
                    ->native(false),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_user')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                ->searchable(),
                    
                
                Tables\Columns\TextColumn::make('id_motorcycle')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rental_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('return_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'view' => Pages\ViewTransaction::route('/{record}'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
