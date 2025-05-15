<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Models\Submission;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use App\Mail\StatusChangedEmail;
use Illuminate\Support\Facades\Mail;





class SubmissionResource extends Resource
{
    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Kunjungan';
    
    protected static ?string $navigationLabel = 'Pengajuan Kunjungan';
    



public static function getNavigationSort(): ?int
{
    return 2; // Angka lebih besar => muncul di bawah
}





    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pengajuan')
                    ->schema([
                        Forms\Components\Select::make('tanggal_kunjungan')
                            ->label('Tanggal Kunjungan')
                            ->required()
                            ->options(
                                Schedule::where('is_available', true)
                                    ->pluck('tanggal_kunjungan', 'tanggal_kunjungan')
                            )
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                $set('waktu_kunjungan', null);
                            }),
                        
                        Forms\Components\Select::make('waktu_kunjungan')
                            ->label('Waktu Kunjungan')
                            ->required()
                            ->options(function (Forms\Get $get) {
                                $tanggal = $get('tanggal_kunjungan');
                                if ($tanggal) {
                                    return Schedule::where('tanggal_kunjungan', $tanggal)
                                        ->where('is_available', true)
                                        ->pluck('waktu_kunjungan', 'waktu_kunjungan');
                                }
                                return [];
                            })
                            ->searchable()
                            ->hidden(fn (Forms\Get $get) => !$get('tanggal_kunjungan')),
                    ])->columns(2),
                    

                Forms\Components\Section::make('Informasi Instansi')
                    ->schema([
                        Forms\Components\TextInput::make('instansi')
                            ->required()
                            ->label('Nama Instansi')
                            ->maxLength(255),
                        Forms\Components\Select::make('jenis_instansi')
                            ->required()
                            ->label('Jenis Instansi')
                            ->options([
                                'sekolah' => 'Sekolah',
                                'universitas' => 'Universitas',
                                'pemerintah' => 'Instansi Pemerintah',
                                'swasta' => 'Instansi Swasta',
                                'komunitas' => 'Komunitas',
                            ]),
                        Forms\Components\Textarea::make('alamat')
                            ->required()
                            ->label('Alamat Instansi')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Penanggung Jawab')
                    ->schema([
                        Forms\Components\TextInput::make('nama_pj')
                            ->required()
                            ->label('Nama Lengkap')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('jabatan_pj')
                            ->required()
                            ->label('Jabatan')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->required()
                            ->label('Nomor Telepon/WhatsApp')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Kunjungan')
                    ->schema([
                        Forms\Components\TextInput::make('jumlah_peserta')
                            ->required()
                            ->label('Jumlah Peserta')
                            ->numeric()
                            ->minValue(1),
                        Forms\Components\Textarea::make('tujuan_kunjungan')
                            ->required()
                            ->label('Tujuan Kunjungan')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Dokumen')
                    ->schema([
                        Forms\Components\FileUpload::make('surat_permohonan')
                            ->label('Surat Permohonan Kunjungan')
                            ->directory('surat-permohonan')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(2048)
                            
                    ]),

                Forms\Components\Section::make('Status Pengajuan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->required()
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu',
                                'approved' => 'Disetujui',
                                'rejected' => 'Ditolak',
                            ])
                            ->default('pending'),
                        Forms\Components\Textarea::make('catatan')
                            ->label('Catatan')
                            ->columnSpanFull(),
                    ]),
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
                    ->sortable()
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
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }
}