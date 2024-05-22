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
use Carbon\Carbon; // Add this import statement

use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Collection;
use App\Models\Motorcycle;
use Filament\Forms\Get;
 


class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Transaction Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('location')
                ->options([
                    'Malang' => 'Malang',
                    'Surabaya' => 'Surabaya',
                    'Bali' => 'Bali',
                ])
                ->live()
                ->required(),

                DatePicker::make('rental_date')
                    ->required()
                    ->live()
                    ->native(false)
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $returnDate = $get('return_date');
                        if ($state && $returnDate) {
                            $duration = Carbon::parse($state)->diffInDays(Carbon::parse($returnDate));
                            $set('duration', $duration);

                            $id_motorcycle = $get('id_motorcycle');
                            if ($id_motorcycle) {
                                $motorcycle = Motorcycle::find($id_motorcycle);
                                if ($motorcycle) {
                                    $price = $duration * $motorcycle->fee;
                                    $set('price', $price);
                                }
                            }
                        }
                    }),

                DatePicker::make('return_date')
                    ->required()
                    ->live()
                    ->native(false)
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $rentalDate = $get('rental_date');
                        if ($state && $rentalDate) {
                            $duration = Carbon::parse($rentalDate)->diffInDays(Carbon::parse($state));
                            $set('duration', $duration);

                            $id_motorcycle = $get('id_motorcycle');
                            if ($id_motorcycle) {
                                $motorcycle = Motorcycle::find($id_motorcycle);
                                if ($motorcycle) {
                                    $price = $duration * $motorcycle->fee;
                                    $set('price', $price);
                                }
                            }
                        }
                    }),

                Forms\Components\Select::make('id_user')
                    ->relationship(name:'user', titleAttribute:'name')
                    ->searchable()
                    ->live()
                    ->preload()
                    ->required(),
                    
                    Forms\Components\Select::make('id_motorcycle')
                    ->options(fn(Get $get): Collection => Motorcycle::query()
                        ->where('location', $get('location'))
                        ->where(function ($query) {
                            $query->where('status', true)
                                ->orWhere('status', 1);
                        })
                        ->pluck('plat_number', 'id'))
                    ->searchable()
                    ->live()
                    ->preload()
                    ->required()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $duration = $get('duration');
                        if ($state && $duration) {
                            $motorcycle = Motorcycle::find($state);
                            if ($motorcycle) {
                                $price = $duration * $motorcycle->fee;
                                $set('price', $price);
                            }
                        }
                    }),
                    

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
                    ])
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        if ($state === 'booked') {
                            $id_motorcycle = $get('id_motorcycle');
                            if ($id_motorcycle) {
                                $motorcycle = Motorcycle::find($id_motorcycle);
                                if ($motorcycle) {
                                    $motorcycle->status = false;
                                    $motorcycle->save();
                                }
                            }
                        }else{
                            $id_motorcycle = $get('id_motorcycle');
                            if ($id_motorcycle) {
                                $motorcycle = Motorcycle::find($id_motorcycle);
                                if ($motorcycle) {
                                    $motorcycle->status = true;
                                    $motorcycle->save();
                                }
                            }
                        }
                    })
                    ->live(),


                Forms\Components\TextInput::make('duration')
                    ->disabled(),

                Forms\Components\Hidden::make('duration')
                    ->dehydrated()
                    ->default(0), // Set a default value

                Forms\Components\TextInput::make('price')
                    ->disabled(),

                Forms\Components\Hidden::make('price')
                    ->dehydrated()
                    ->default(0), // Set a default value
                ]);


        }

    static function getDuration($rental_date, $return_date){
        return Carbon::parse($rental_date)->diffInDays(Carbon::parse($return_date));
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                ->searchable(),
                    
                
                Tables\Columns\TextColumn::make('motorcycle.plat_number')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('motorcycle.image')
                ->toggleable(isToggledHiddenByDefault: false),

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
            // 'user' => RelationManagers\UserRelationManager::class,
            // 'motorcycle' => RelationManagers\MotorcycleRelationManager::class,
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
