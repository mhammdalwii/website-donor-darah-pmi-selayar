<?php

namespace App\Filament\Resources\Pendonors\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PendonorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('nik')
                    ->required(),
                Select::make('golongan_darah')
                    ->options(['A' => 'A', 'B' => 'B', 'AB' => 'A b', 'O' => 'O'])
                    ->required(),
                TextInput::make('rhesus')
                    ->required()
                    ->default('+'),
                TextInput::make('nomor_telepon')
                    ->tel()
                    ->required(),
                DatePicker::make('tanggal_donor_terakhir'),
                Textarea::make('alamat')
                    ->columnSpanFull(),
            ]);
    }
}
