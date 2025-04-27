<?php

namespace App\Filament\Resources\KunjunganDitolakResource\Pages;

use App\Filament\Resources\KunjunganDitolakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKunjunganDitolak extends EditRecord
{
    protected static string $resource = KunjunganDitolakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
