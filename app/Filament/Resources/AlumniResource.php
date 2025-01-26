<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Filament\Resources\AlumniResource\RelationManagers;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationLabel = 'Alumni';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->required()
                ->label('Nama'),
            Forms\Components\TextInput::make('tahun')
                ->required()
                ->label('Tahun Lulus')
                ->numeric(), // Tambahkan validasi numeric
            Forms\Components\TextInput::make('provinsi_bekerja')
                ->nullable()
                ->label('Provinsi Bekerja'),
            Forms\Components\TextInput::make('kabupaten_bekerja')
                ->nullable()
                ->label('Kabupaten Bekerja/Wirausaha'),
            Forms\Components\TextInput::make('nama_perusahaan')
                ->nullable()
                ->label('Nama Perusahaan/Kantor/Posisi'),
            Forms\Components\TextInput::make('studi_lanjut')
                ->nullable()
                ->label('Studi Lanjut/Perguruan Tinggi'),
            Forms\Components\TextInput::make('program_studi')
                ->nullable()
                ->label('Program Studi'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('tahun')->label('Tahun Lulus'),
                TextColumn::make('provinsi_bekerja')->label('Provinsi Bekerja'),
                TextColumn::make('kabupaten_bekerja')->label('Kabupaten Bekerja/Wirausaha'),
                TextColumn::make('nama_perusahaan')->label('Nama Perusahaan/Kantor/Posisi'),
                TextColumn::make('studi_lanjut')->label('Studi Lanjut/Perguruan Tinggi'),
                TextColumn::make('program_studi')->label('Program Studi'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
