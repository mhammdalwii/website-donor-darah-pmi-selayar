<?php

namespace App\Filament\Resources\Galeris;

use App\Filament\Resources\Galeris\Pages\CreateGaleri;
use App\Filament\Resources\Galeris\Pages\EditGaleri;
use App\Filament\Resources\Galeris\Pages\ListGaleris;
use App\Models\Galeri;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Section;
use Filament\Forms;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $modelLabel = 'Galeri Foto';
    protected static ?string $pluralModelLabel = 'Galeri Kegiatan';
    protected static string | \UnitEnum | null $navigationGroup = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Upload Dokumentasi')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->label('Judul / Keterangan Foto')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\FileUpload::make('gambar')
                        ->label('File Foto')
                        ->image()
                        ->maxSize(2048)
                        ->disk('public_uploads')
                        ->directory('galeri-images')
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Foto')
                    ->disk('public_uploads')
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Keterangan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Diupload Pada')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => ListGaleris::route('/'),
            'create' => CreateGaleri::route('/create'),
            'edit' => EditGaleri::route('/{record}/edit'),
        ];
    }
}
