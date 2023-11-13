<?php

namespace App\Filament\Resources\PembicaraResource\Pages;

use App\Filament\Resources\PembicaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembicaras extends ListRecords
{
    protected static string $resource = PembicaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
