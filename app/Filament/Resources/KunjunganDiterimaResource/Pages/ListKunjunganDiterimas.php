<?php

namespace App\Filament\Resources\KunjunganDiterimaResource\Pages;

use App\Filament\Resources\KunjunganDiterimaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKunjunganDiterimas extends ListRecords
{
    protected static string $resource = KunjunganDiterimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
