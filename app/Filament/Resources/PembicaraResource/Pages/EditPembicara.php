<?php

namespace App\Filament\Resources\PembicaraResource\Pages;

use App\Filament\Resources\PembicaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembicara extends EditRecord
{
    protected static string $resource = PembicaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
