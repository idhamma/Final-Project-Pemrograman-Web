<?php

namespace App\Filament\Resources\MotorcyleResource\Pages;

use App\Filament\Resources\MotorcyleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotorcyles extends ListRecords
{
    protected static string $resource = MotorcyleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
