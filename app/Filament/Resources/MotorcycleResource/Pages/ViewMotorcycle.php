<?php

namespace App\Filament\Resources\MotorcycleResource\Pages;

use App\Filament\Resources\MotorcycleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMotorcycle extends ViewRecord
{
    protected static string $resource = MotorcycleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
