<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemografiResource\Pages;
use App\Filament\Resources\DemografiResource\RelationManagers;
use App\Models\Demografi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;

class DemografiResource extends Resource
{
    protected static ?string $model = Demografi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Section::make('Data Utama')
                        ->columns(2)
                        ->schema([
                            TextInput::make('penduduk_total')->numeric()->required(),
                            TextInput::make('kk_total')->label('Jumlah KK')->numeric()->required(),
                            TextInput::make('laki_laki')->numeric()->required(),
                            TextInput::make('perempuan')->numeric()->required(),
                        ]),
                    Section::make('Rincian Usia')
                        ->columns(3)
                        ->schema([
                            TextInput::make('usia_balita')->numeric()->required(),
                            TextInput::make('usia_anak')->numeric()->required(),
                            TextInput::make('usia_remaja')->numeric()->required(),
                            TextInput::make('usia_dewasa')->numeric()->required(),
                            TextInput::make('usia_lansia')->numeric()->required(),
                            TextInput::make('usia_tidak_diketahui')->numeric()->required(),
                        ]),
                        Section::make('Rincian Tingkat Pendidikan')
                    ->columns(3)
                    ->schema([
                        TextInput::make('pendidikan_tidak_sekolah')->numeric()->required(),
                        TextInput::make('pendidikan_belum_tamat_sd')->numeric()->required(),
                        TextInput::make('pendidikan_tamat_sd')->numeric()->required(),
                        TextInput::make('pendidikan_sltp')->label('SLTP/Sederajat')->numeric()->required(),
                        TextInput::make('pendidikan_slta')->label('SLTA/Sederajat')->numeric()->required(),
                        TextInput::make('pendidikan_akademi_d3')->label('Akademi/D3')->numeric()->required(),
                        TextInput::make('pendidikan_s1')->label('S1/Sederajat')->numeric()->required(),
                        TextInput::make('pendidikan_s2')->label('S2/Sederajat')->numeric()->required(),
                    ]),

                Section::make('Rincian Mata Pencaharian')
                    ->columns(3)
                    ->schema([
                        TextInput::make('pekerjaan_belum_tidak_bekerja')->numeric()->required(),
                        TextInput::make('pekerjaan_mengurus_rumah_tangga')->numeric()->required(),
                        TextInput::make('pekerjaan_pelajar_mahasiswa')->numeric()->required(),
                        TextInput::make('pekerjaan_pensiunan')->numeric()->required(),
                        TextInput::make('pekerjaan_pns')->label('PNS')->numeric()->required(),
                        TextInput::make('pekerjaan_tni')->label('TNI')->numeric()->required(),
                        TextInput::make('pekerjaan_polri')->label('POLRI')->numeric()->required(),
                        TextInput::make('pekerjaan_perangkat_desa')->numeric()->required(),
                        TextInput::make('pekerjaan_wiraswasta')->numeric()->required(),
                        TextInput::make('pekerjaan_petani')->label('Petani/Pekebun')->numeric()->required(),
                        TextInput::make('pekerjaan_buruh_tani')->label('Buruh Tani')->numeric()->required(),
                        TextInput::make('pekerjaan_buruh_harian_lepas')->numeric()->required(),
                        TextInput::make('pekerjaan_karyawan_bumn')->label('Karyawan BUMN')->numeric()->required(),
                        TextInput::make('pekerjaan_pedagang')->numeric()->required(),
                        TextInput::make('pekerjaan_dosen')->numeric()->required(),
                        TextInput::make('pekerjaan_guru')->numeric()->required(),
                        TextInput::make('pekerjaan_karyawan_honorer')->numeric()->required(),
                    ]),

                Section::make('Rincian Agama')
                    ->columns(3)
                    ->schema([
                        TextInput::make('agama_islam')->numeric()->required(),
                        TextInput::make('agama_kristen')->numeric()->required(),
                        TextInput::make('agama_katholik')->numeric()->required(),
                    ]),

                Section::make('Persebaran Penduduk Berdasarkan Wilayah (RT)')
                ->columns(4)
                ->schema([
                    TextInput::make('wilayah_rt_1')->label('RT 1')->numeric()->required(),
                    TextInput::make('wilayah_rt_2')->label('RT 2')->numeric()->required(),
                    TextInput::make('wilayah_rt_3')->label('RT 3')->numeric()->required(),
                    TextInput::make('wilayah_rt_4')->label('RT 4')->numeric()->required(),
                ]),

            Section::make('Detail Laki-laki Berdasarkan Usia')
                ->columns(3)
                ->schema([
                    TextInput::make('lk_dewasa')->label('Dewasa')->numeric()->required(),
                    TextInput::make('lk_lansia')->label('Lansia')->numeric()->required(),
                    TextInput::make('lk_remaja')->label('Remaja')->numeric()->required(),
                    TextInput::make('lk_anak')->label('Anak-anak')->numeric()->required(),
                    TextInput::make('lk_balita')->label('Balita')->numeric()->required(),
                    TextInput::make('lk_tidak_diketahui')->label('Tidak Diketahui')->numeric()->required(),
                ]),

            Section::make('Detail Perempuan Berdasarkan Usia')
                ->columns(3)
                ->schema([
                    TextInput::make('pr_dewasa')->label('Dewasa')->numeric()->required(),
                    TextInput::make('pr_lansia')->label('Lansia')->numeric()->required(),
                    TextInput::make('pr_remaja')->label('Remaja')->numeric()->required(),
                    TextInput::make('pr_anak')->label('Anak-anak')->numeric()->required(),
                    TextInput::make('pr_balita')->label('Balita')->numeric()->required(),
                    TextInput::make('pr_tidak_diketahui')->label('Tidak Diketahui')->numeric()->required(),
                ]),
                    // ... Buat Section lain untuk Pendidikan, Pekerjaan, dan Agama dengan cara yang sama ...
                ]);
            }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageDemografis::route('/'),
        ];
    }
}
