<?php

namespace App\Filament\Resources\MotorcyleResource\Pages;

use App\Filament\Resources\MotorcyleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMotorcyle extends ViewRecord
{
    protected static string $resource = MotorcyleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
