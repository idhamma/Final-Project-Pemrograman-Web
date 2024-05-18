<?php

namespace App\Filament\Resources\MotorcyleResource\Pages;

use App\Filament\Resources\MotorcyleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMotorcyle extends EditRecord
{
    protected static string $resource = MotorcyleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
