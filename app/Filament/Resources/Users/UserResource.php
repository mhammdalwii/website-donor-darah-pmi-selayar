<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Manajemen Pengguna';
    protected static ?string $modelLabel = 'Pengguna';
    protected static ?string $pluralModelLabel = 'Data Pengguna';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Akun')
                ->description('Kelola data dan hak akses pengguna di sini.')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('no_hp')
                        ->label('Nomor HP')
                        ->required()
                        ->tel()
                        ->extraInputAttributes(['oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"])
                        ->regex('/^[0-9]+$/')
                        ->unique(ignoreRecord: true)
                        ->maxLength(12),

                    Forms\Components\Textarea::make('alamat')
                        ->label('Alamat Lengkap')
                        ->maxLength(65535)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('password')
                        ->label('Password Baru')
                        ->password()
                        ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        ->dehydrated(fn($state) => filled($state))
                        ->required(fn(string $context): bool => $context === 'create'),

                    Forms\Components\Toggle::make('is_admin')
                        ->label('Jadikan Admin')
                        ->helperText(fn() => Auth::user()->email === 'admin@pmi.com'
                            ? 'Aktifkan ini untuk memberikan hak akses masuk ke Dashboard Admin.'
                            : 'Hanya Super Admin (admin@pmi.com) yang dapat mengubah hak akses ini.')
                        ->onColor('success')
                        ->offColor('danger')
                        ->inline(false)
                        // KUNCI SUPER ADMIN: Fitur ini otomatis terkunci (disabled) jika yang login BUKAN admin@pmi.com
                        ->disabled(fn() => Auth::user()->email !== 'admin@pmi.com')
                        ->dehydrated(), // Wajib ada agar nilai is_admin tidak hilang saat admin biasa menyimpan form
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('no_hp')
                    ->label('Nomor HP')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_admin')
                    ->label('Role/Peran')
                    ->boolean()
                    ->trueIcon('heroicon-s-shield-check')
                    ->falseIcon('heroicon-s-user')
                    ->trueColor('success')
                    ->falseColor('gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_admin')
                    ->label('Filter Role')
                    ->boolean()
                    ->trueLabel('Hanya Admin')
                    ->falseLabel('Hanya Masyarakat Biasa')
                    ->native(false),
            ])
            ->actions([
                EditAction::make()
                    ->hidden(fn($record) => $record->email === 'admin@pmi.com' && Auth::user()->email !== 'admin@pmi.com'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
