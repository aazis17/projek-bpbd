<?php

namespace App\Filament\Resources\KunjunganDitolakResource\Pages;

use App\Filament\Resources\KunjunganDitolakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKunjunganDitolaks extends ListRecords
{
    protected static string $resource = KunjunganDitolakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
