<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusResource\Pages;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Models\Pengurus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nama')
                ->required()
                ->maxLength(255),
            TextInput::make('jabatan')
                ->required()
                ->maxLength(255),
            FileUpload::make('foto')
                ->directory('pengurus') // Foto akan disimpan di 'storage/app/public/pengurus-fotos'
                ->image()
                ->required(),
            TextInput::make('urutan')
                ->numeric() // Memastikan input hanya angka
                ->default(0)
                ->helperText('Gunakan untuk mengurutkan posisi. Angka lebih kecil akan tampil lebih dulu.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')->circular(),
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('jabatan')->searchable(),
                TextColumn::make('urutan')->sortable()->toggleable(isToggledHiddenByDefault: true), // Sembunyikan by default
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
