<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KunjunganDiterimaResource\Pages;
use App\Filament\Resources\KunjunganDiterimaResource\RelationManagers;
use App\Models\KunjunganDiterima;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;





class KunjunganDiterimaResource extends Resource
{
    protected static ?string $model = KunjunganDiterima::class;


    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Diterima';
    protected static ?string $navigationGroup = 'Kunjungan';

    
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()->where('status', 'diterima');
}
public static function getNavigationSort(): ?int
{
    return 3; // Angka lebih besar => muncul di bawah
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListKunjunganDiterimas::route('/'),
            'create' => Pages\CreateKunjunganDiterima::route('/create'),
            'edit' => Pages\EditKunjunganDiterima::route('/{record}/edit'),
        ];
    }
}
