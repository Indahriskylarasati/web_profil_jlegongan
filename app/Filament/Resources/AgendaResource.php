<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category')
                    ->options([
                        'Pemuda Jlegongan' => 'Pemuda Jlegongan',
                        'Ibu PKK' => 'Ibu PKK',
                        'KWT' => 'KWT',
                        'Posyandu' => 'Posyandu',
                        'Kegiatan Kerohanian' => 'Kegiatan Kerohanian',
                    ])
                    ->required()
                    ->label('Kategori Agenda'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Kegiatan'),
                Forms\Components\TextInput::make('schedule')
                    ->required()
                    ->maxLength(255)
                    ->label('Jadwal Kegiatan'),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label('Deskripsi'),
                Forms\Components\FileUpload::make('main_image')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('agenda-images'),
                Forms\Components\FileUpload::make('gallery')
                    ->label('Galeri Dokumentasi (Bisa lebih dari satu)')
                    ->multiple()
                    ->image()
                    ->disk('public')
                    ->directory('agenda-gallery'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')->label('Gambar'),
                Tables\Columns\TextColumn::make('title')->label('Nama Kegiatan')->searchable(),
                Tables\Columns\TextColumn::make('category')->label('Kategori')->badge(),
                Tables\Columns\TextColumn::make('schedule')->label('Jadwal'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }    
}