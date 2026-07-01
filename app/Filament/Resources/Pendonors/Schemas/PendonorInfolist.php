<?php

namespace App\Filament\Resources\Pendonors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PendonorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_lengkap'),
                TextEntry::make('nik'),
                TextEntry::make('golongan_darah')
                    ->badge(),
                TextEntry::make('rhesus'),
                TextEntry::make('nomor_telepon'),
                TextEntry::make('tanggal_donor_terakhir')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('alamat')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
