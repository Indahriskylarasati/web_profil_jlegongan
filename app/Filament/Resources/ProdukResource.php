<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Import komponen yang akan kita gunakan
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag'; // Ikon diganti agar lebih sesuai

    // Fungsi untuk mendefinisikan form input
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Kolom input untuk 'nama_pemilik'
                TextInput::make('nama_pemilik')
                    ->required() // Wajib diisi
                    ->maxLength(255), // Batas karakter

                // Kolom input untuk 'jenis_usaha'
                TextInput::make('jenis_usaha')
                    ->required()
                    ->maxLength(255),

                // Kolom input untuk 'deskripsi'
                Textarea::make('deskripsi')
                    ->columnSpanFull(), // Mengambil lebar penuh

                // Kolom input untuk 'kategori' dengan pilihan
                Select::make('kategori')
                    ->options([
                        'Kuliner' => 'Kuliner',
                        'Pertanian' => 'Pertanian',
                        'Peternakan' => 'Peternakan',
                        'Perikanan' => 'Perikanan',
                        'Jasa' => 'Jasa',
                        'Kerajinan' => 'Kerajinan',
                    ])
                    ->required(),

                // Kolom input untuk 'nomor_wa'
                TextInput::make('nomor_wa')
                    ->label('Nomor WhatsApp') // Label yang lebih ramah
                    ->tel() // Memberi hint input telepon
                    ->maxLength(20),

                // Kolom input untuk 'akun_instagram'
                TextInput::make('akun_instagram')
                    ->label('Akun Instagram')
                    ->prefix('@') // Memberi awalan @
                    ->maxLength(255),

                // Kolom untuk upload gambar 'foto_utama'
                FileUpload::make('foto_utama')
                    ->label('Foto Utama Produk')
                    ->image() // Memastikan yang diupload adalah gambar
                    ->directory('images/produks') // Simpan di folder public/storage/images/produks
                    ->columnSpanFull(),
            ]);
    }

    // Fungsi untuk mendefinisikan tabel daftar data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk menampilkan 'foto_utama'
                ImageColumn::make('foto_utama')
                    ->label('Foto'),

                // Kolom untuk menampilkan 'nama_pemilik'
                TextColumn::make('nama_pemilik')
                    ->searchable() // Bisa dicari
                    ->sortable(),  // Bisa diurutkan

                // Kolom untuk menampilkan 'jenis_usaha'
                TextColumn::make('jenis_usaha')
                    ->searchable(),

                // Kolom untuk menampilkan 'kategori'
                TextColumn::make('kategori')
                    ->searchable()
                    ->sortable(),
                
                // Kolom untuk menampilkan 'nomor_wa'
                TextColumn::make('nomor_wa')
                    ->label('WhatsApp')
                    ->searchable(),

                // Kolom untuk menampilkan tanggal dibuat
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan secara default
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Menambahkan tombol delete untuk setiap baris
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }    
}
