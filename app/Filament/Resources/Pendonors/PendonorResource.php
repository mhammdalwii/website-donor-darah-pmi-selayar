<?php

namespace App\Filament\Resources\Pendonors;

use App\Filament\Resources\Pendonors\Pages;
use App\Models\Pendonor;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class PendonorResource extends Resource
{
    protected static ?string $model = Pendonor::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'Data Pendonor';
    protected static ?string $pluralModelLabel = 'Data Pendonor';

    protected static string | \UnitEnum | null $navigationGroup = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Pribadi')
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nomor_telepon')
                        ->label('Nomor Telepon/WhatsApp')
                        ->tel()
                        ->required(),
                    Textarea::make('alamat')
                        ->label('Alamat Lengkap')
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Data Medis')
                ->schema([
                    Select::make('golongan_darah')
                        ->label('Golongan Darah')
                        ->options([
                            'A' => 'A',
                            'B' => 'B',
                            'AB' => 'AB',
                            'O' => 'O',
                        ])
                        ->required(),
                    Forms\Components\DatePicker::make('tanggal_donor_terakhir')
                        ->label('Tanggal Donor Terakhir'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Kolom Nama Pendonor (Dibuat lebih tebal untuk hierarki visual)
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Pendonor')
                    ->weight('semibold')
                    ->searchable()
                    ->sortable(),

                // 2. Kolom Alamat (Diberi limit & placeholder jika kosong)
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(40)
                    ->placeholder('-')
                    ->color('gray')
                    ->searchable(),

                // 3. Kolom Golongan Darah (Rata tengah untuk estetika badge)
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
                    ->searchable(),

                // 4. Kolom Kontak WA (Dibuat menarik dan interaktif)
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Kontak WA')
                    ->icon('heroicon-m-chat-bubble-left-ellipsis')
                    ->color('success')
                    ->weight('medium')
                    ->searchable()
                    ->url(function (Pendonor $record) {
                        $nomor = $record->nomor_telepon ?? '';
                        $phone = preg_replace('/[^0-9]/', '', $nomor);
                        if (substr($phone, 0, 1) === '0') {
                            $phone = '62' . substr($phone, 1);
                        }
                        return "https://wa.me/{$phone}";
                    })
                    ->openUrlInNewTab(),

                // 5. Kolom Tanggal Donor (Format rapi, rata tengah, placeholder jika belum pernah donor)
                Tables\Columns\TextColumn::make('tanggal_donor_terakhir')
                    ->label('Tanggal Donor')
                    ->date('d M Y')
                    ->alignCenter()
                    ->placeholder('Belum pernah')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('golongan_darah')
                    ->label('Filter Golongan Darah')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'AB' => 'AB',
                        'O' => 'O',
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
            'index' => Pages\ListPendonors::route('/'),
            'create' => Pages\CreatePendonor::route('/create'),
            'edit' => Pages\EditPendonor::route('/{record}/edit'),
        ];
    }
}
