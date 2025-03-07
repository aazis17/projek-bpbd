<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $navigationLabel = 'Jadwal Kunjungan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal_kunjungan')
                    ->label('Tanggal Kunjungan')
                    ->required()
                    ->unique(ignoreRecord: true) // Pastikan tanggal unik
                    ->minDate(now()->addDay()), // Pastikan tanggal setelah hari ini
                Forms\Components\Select::make('waktu_kunjungan')
                    ->label('Waktu Kunjungan')
                    ->required()
                    ->options([
                        '09:00' => '09:00 WIB',
                        '10:00' => '10:00 WIB',
                        '13:00' => '13:00 WIB',
                        '14:00' => '14:00 WIB',
                    ]),
                Forms\Components\Toggle::make('is_available')
                    ->label('Tersedia')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_kunjungan')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu_kunjungan')
                    ->label('Waktu'),
                Tables\Columns\IconColumn::make('is_available')
                    ->label('Tersedia')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}