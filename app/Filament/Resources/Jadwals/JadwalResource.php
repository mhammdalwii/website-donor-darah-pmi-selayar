<?php

namespace App\Filament\Resources\jadwals;

use App\Filament\Resources\Jadwals\Pages;
use App\Models\Jadwal;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $modelLabel = 'Jadwal Kegiatan';
    protected static ?string $pluralModelLabel = 'Update jadwal lokasi kegiatan';

    protected static string | \UnitEnum | null $navigationGroup = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Kegiatan')
                ->schema([
                    Forms\Components\TextInput::make('nama_kegiatan')
                        ->label('Nama / Judul Kegiatan')
                        ->placeholder('Contoh: Donor Darah Massal HUT RI')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('lokasi')
                        ->label('Lokasi Pelaksanaan')
                        ->placeholder('Contoh: Lapangan Pemuda Benteng')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('penanggung_jawab')
                        ->label('Penanggung Jawab / Instansi')
                        ->placeholder('Contoh: PMI Kepulauan Selayar')
                        ->maxLength(255),
                ]),

            Section::make('Waktu Pelaksanaan & Status')
                ->schema([
                    Forms\Components\DatePicker::make('tanggal')
                        ->label('Tanggal Kegiatan')
                        ->required(),

                    Forms\Components\TimePicker::make('waktu_mulai')
                        ->label('Waktu Mulai')
                        ->required()
                        ->seconds(false), // Menghilangkan pilihan detik agar lebih simpel

                    Forms\Components\TimePicker::make('waktu_selesai')
                        ->label('Waktu Selesai')
                        ->seconds(false),

                    Forms\Components\Select::make('status')
                        ->label('Status Kegiatan')
                        ->options([
                            'terjadwal' => 'Terjadwal (Akan Datang)',
                            'selesai' => 'Selesai',
                            'batal' => 'Dibatalkan',
                        ])
                        ->default('terjadwal')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->label('Kegiatan')
                    ->weight('semibold')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->alignCenter()
                    ->sortable(),

                // Menggabungkan Waktu Mulai & Selesai di satu kolom agar rapi
                Tables\Columns\TextColumn::make('waktu_mulai')
                    ->label('Jam Pelaksanaan')
                    ->alignCenter()
                    ->formatStateUsing(function ($record) {
                        $selesai = $record->waktu_selesai ? ' - ' . date('H:i', strtotime($record->waktu_selesai)) : ' - Selesai';
                        return date('H:i', strtotime($record->waktu_mulai)) . $selesai;
                    }),

                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->alignCenter()
                    ->color(fn(?string $state): string => match ($state) {
                        'terjadwal' => 'info',
                        'selesai' => 'success',
                        'batal' => 'danger',
                        default => 'gray',
                    }),
            ])
            // Default urutan tabel berdasarkan tanggal terbaru
            ->defaultSort('tanggal', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'terjadwal' => 'Terjadwal',
                        'selesai' => 'Selesai',
                        'batal' => 'Batal',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}
