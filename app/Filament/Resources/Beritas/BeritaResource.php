<?php

namespace App\Filament\Resources\Beritas;

use App\Filament\Resources\Beritas\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;



class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $modelLabel = 'Data Berita';
    protected static ?string $pluralModelLabel = 'Daftar Berita';

    protected static string | \UnitEnum | null $navigationGroup = null;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Konten Utama')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->label('Judul Berita')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                    // UPDATE: Slug dinonaktifkan total (disabled) tapi tetap disimpan (dehydrated)
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug URL')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->disabled() // Membuat field abu-abu & tidak bisa diketik manual
                        ->dehydrated(),

                    Forms\Components\RichEditor::make('konten')
                        ->label('Isi Berita')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('Media & Pengaturan')
                ->schema([
                    // UPDATE: Menambahkan batas upload gambar maksimal 2MB
                    Forms\Components\FileUpload::make('gambar')
                        ->label('Gambar Sampul (Thumbnail)')
                        ->image()
                        ->maxSize(2048)
                        ->disk('public_uploads')
                        ->directory('berita-images')
                        ->columnSpanFull(),

                    Forms\Components\Select::make('status')
                        ->label('Status Publikasi')
                        ->options([
                            'draft' => 'Draft (Simpan Sementara)',
                            'publish' => 'Publish (Tampilkan ke Publik)',
                        ])
                        ->default('draft')
                        ->required(),

                    Forms\Components\DatePicker::make('tanggal_publikasi')
                        ->label('Tanggal Publikasi')
                        ->default(now())
                        ->required(),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Sampul')
                    ->disk('public_uploads')
                    ->square(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Berita')
                    ->weight('semibold')
                    ->limit(50)
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->alignCenter()
                    ->color(fn(?string $state): string => match ($state) {
                        'draft' => 'warning',
                        'publish' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('tanggal_publikasi')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
