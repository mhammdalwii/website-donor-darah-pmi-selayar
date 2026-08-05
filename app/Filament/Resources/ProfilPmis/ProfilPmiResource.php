<?php

namespace App\Filament\Resources\ProfilPmis;

use App\Filament\Resources\ProfilPmis\Pages;
use App\Models\ProfilPmi;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class ProfilPmiResource extends Resource
{
    protected static ?string $model = ProfilPmi::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-building-office-2';

    // Menggunakan penamaan label model gaya terbaru
    protected static ?string $modelLabel = 'Profil & Struktur';
    protected static ?string $pluralModelLabel = 'Profil & Struktur';

    protected static string | \UnitEnum | null $navigationGroup = null;

    public static function canCreate(): bool
    {
        return ProfilPmi::count() === 0;
    }


    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Visi & Misi PMI')
                ->schema([
                    RichEditor::make('visi')
                        ->label('Visi')
                        ->required()
                        ->columnSpanFull(),
                    RichEditor::make('misi')
                        ->label('Misi')
                        ->required()
                        ->columnSpanFull(),
                ]),

            Section::make('Bagan Struktur Organisasi')
                ->schema([
                    FileUpload::make('gambar_struktur')
                        ->label('Unggah Foto Struktur (Bisa lebih dari 1)')
                        ->image()
                        ->multiple()
                        ->reorderable()
                        ->disk('public_uploads')
                        ->directory('struktur-pmi')
                        ->maxSize(2048)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('visi')
                    ->label('Visi')
                    ->html()
                    ->limit(50),
                ImageColumn::make('gambar_struktur_1')
                    ->label('Struktur Utama'),
                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
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
            'index' => Pages\ListProfilPmis::route('/'),
            'create' => Pages\CreateProfilPmi::route('/create'),
            'edit' => Pages\EditProfilPmi::route('/{record}/edit'),
        ];
    }
}
