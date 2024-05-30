<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotorcycleResource\Pages;
use App\Filament\Resources\MotorcycleResource\RelationManagers;
use App\Models\Motorcycle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class MotorcycleResource extends Resource
{
    protected static ?string $model = Motorcycle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationGroup = 'Vehicles Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('plat_number')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('brand')
            ->datalist([
                'Honda',
                'Yamaha',
                'Suzuki',
                'Kawasaki',
                'Vespa',
                'KTM',
            ]),     

            Forms\Components\TextInput::make('category')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('cc')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('year')
                ->required(),

            Select::make('location')
            ->options([
                'Malang' => 'Malang',
                'Surabaya' => 'Surabaya',
                'Bali' => 'Bali',
            ])
            ->native(false),


            TextInput::make('fee')
            ->mask(RawJs::make('$money($input)'))
            ->stripCharacters(',')
            ->numeric()
            ->required(),

            FileUpload::make('image'),

            Toggle::make('status')
            ->onColor('success'),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plat_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cc')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
    
                Tables\Columns\TextColumn::make('fee')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('status')
                    ->sortable(),
            ])
            ->filters([
                
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
            'index' => Pages\ListMotorcycles::route('/'),
            'create' => Pages\CreateMotorcycle::route('/create'),
            'view' => Pages\ViewMotorcycle::route('/{record}'),
            'edit' => Pages\EditMotorcycle::route('/{record}/edit'),
        ];
    }
}
