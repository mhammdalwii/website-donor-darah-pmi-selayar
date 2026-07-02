<?php

namespace App\Filament\Resources\StokDarahs;

use App\Filament\Resources\StokDarahs\Pages;
use App\Models\StokDarah;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Section;


class StokDarahResource extends Resource
{
    protected static ?string $model = StokDarah::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $modelLabel = 'Stok Darah';
    protected static ?string $pluralModelLabel = 'Update Stok Darah';

    protected static string | \UnitEnum | null $navigationGroup = null;

    // Menonaktifkan tombol "Create" (Tambah Data) karena 4 baris sudah fix
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()
                ->schema([
                    Forms\Components\TextInput::make('golongan_darah')
                        ->label('Golongan Darah')
                        ->disabled()
                        ->dehydrated(false),

                    Forms\Components\TextInput::make('jumlah_kantong')
                        ->label('Jumlah Kantong (Stok Tersedia)')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->default(0),
                ])
                ->columns(2)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('golongan_darah')
                    ->label('Golongan Darah')
                    ->badge()
                    ->alignCenter()
                    ->color(fn(?string $state): string => match ($state) {
                        'A' => 'danger',
                        'B' => 'warning',
                        'AB' => 'success',
                        'O' => 'info',
                        default => 'gray',
                    })
                    ->size('lg'),

                Tables\Columns\TextColumn::make('jumlah_kantong')
                    ->label('Total Kantong')
                    ->numeric()
                    ->alignCenter()
                    ->weight('bold')
                    ->size('lg'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y - H:i')
                    ->alignCenter(),
            ])
            ->actions([
                EditAction::make(),
                // DeleteAction sengaja tidak dimasukkan agar data tidak bisa dihapus
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStokDarahs::route('/'),
            'edit' => Pages\EditStokDarah::route('/{record}/edit'),
        ];
    }
}
