<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KunjunganDitolakResource\Pages;
use App\Filament\Resources\KunjunganDitolakResource\RelationManagers;
use App\Models\KunjunganDitolak;
use App\Models\Submission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;


class KunjunganDitolakResource extends Resource
{
    protected static ?string $model = KunjunganDitolak::class;

    protected static ?string $navigationIcon = 'heroicon-o-x-circle';
    protected static ?string $navigationLabel = 'Ditolak';
    protected static ?string $navigationGroup = 'Kunjungan';
    


    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public static function getNavigationSort(): ?int
    {
        return 4; // Angka lebih besar => muncul di bawah
    }

    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->whereHas('submission', function ($query) {
            $query->where('status', 'rejected');
        });

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
            Tables\Columns\TextColumn::make('tanggal_kunjungan')
                ->label('Tanggal')
                ->date()
                ->sortable(),
            // Tables\Columns\TextColumn::make('waktu_kunjungan')
            //     ->label('Waktu'),
            Tables\Columns\TextColumn::make('instansi')
                ->label('Instansi')
                ->searchable(),
            Tables\Columns\TextColumn::make('nama_pj')
                ->label('Penanggung Jawab')
                ->searchable(),
            // Tables\Columns\TextColumn::make('phone')
            //     ->label('Telepon'),
            Tables\Columns\TextColumn::make('jumlah_peserta')
                ->label('Jumlah Peserta')
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                }),
            // Tables\Columns\TextColumn::make('catatan')
            //     ->label('Catatan')
            //     ->columnSpanFull(),
            // Tables\Columns\TextColumn::make('created_at')
            //     ->label('Tanggal Pengajuan')
            //     ->dateTime()
            //     ->sortable(),
            Tables\Columns\TextColumn::make('surat_permohonan')
                ->label('Surat Permohonan')
                ->formatStateUsing(function ($state) {
                return '<a href="' . asset('storage/' . $state) . '" target="_blank">Download</a>';
                })
                ->html(),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            SelectFilter::make('status')
                ->options([
                    'pending' => 'Menunggu',
                    'approved' => 'Disetujui',
                    'rejected' => 'Ditolak',
                ]),
            SelectFilter::make('jenis_instansi')
                ->label('Jenis Instansi')
                ->options([
                    'sekolah' => 'Sekolah',
                    'universitas' => 'Universitas',
                    'pemerintah' => 'Instansi Pemerintah',
                    'swasta' => 'Instansi Swasta',
                    'komunitas' => 'Komunitas',
                ]),
        ])
        ->actions([
            ActionGroup::make([

            Action::make('whatsapp')
            ->label('WhatsApp')
            ->icon('heroicon-o-chat-bubble-oval-left')
            ->color('success')
            ->url(fn ($record) => "https://wa.me/{$record->phone}", shouldOpenInNewTab: true)
            ->visible(fn ($record) => $record->phone !== null),
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]),
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
            'index' => Pages\ListKunjunganDitolaks::route('/'),
            'create' => Pages\CreateKunjunganDitolak::route('/create'),
            'edit' => Pages\EditKunjunganDitolak::route('/{record}/edit'),
        ];
    }
}
