<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Jadwal Kunjungan';
    protected static ?string $navigationGroup = 'Pengaturan';

    // Menggunakan schema untuk mendefinisikan form
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\DatePicker::make('tanggal_kunjungan') // Field untuk tanggal_kunjungan
                ->label('Tanggal Kunjungan')
                ->required(),

            Forms\Components\TimePicker::make('waktu_kunjungan') // Field untuk waktu_kunjungan
                ->label('Waktu Kunjungan')
                ->required(),

            Forms\Components\Toggle::make('is_available') // Field untuk is_available
                ->label('Tersedia')
                ->default(true),
        ]);
    }

    // Menampilkan tabel dengan kolom sesuai field yang ada
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_kunjungan') // Kolom untuk tanggal_kunjungan
                    ->label('Tanggal Kunjungan')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('waktu_kunjungan') // Kolom untuk waktu_kunjungan
                    ->label('Waktu Kunjungan')
                    ->time('H:i'),

                Tables\Columns\BooleanColumn::make('is_available') // Kolom untuk is_available
                    ->label('Tersedia'),
            ])
            ->filters([
                // Filter tambahan bisa ditambahkan di sini
            ]);
    }

    // Mendefinisikan halaman yang tersedia pada resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
