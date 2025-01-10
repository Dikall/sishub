<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurusanResource\Pages;
use App\Filament\Resources\JurusanResource\RelationManagers;
use App\Models\Jurusan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class JurusanResource extends Resource
{
    protected static ?string $model = Jurusan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_jurusan') 
                    ->required(),
                Forms\Components\Textarea::make('deskripsi') 
                    ->required(), 
                Forms\Components\Textarea::make('visi') 
                    ->required(), 
                Forms\Components\Textarea::make('misi') 
                    ->required(), 
                Forms\Components\Textarea::make('tujuan') 
                    ->required(),
                Forms\Components\FileUpload::make('foto')
                    ->image() // Memastikan hanya file gambar yang bisa diunggah
                    ->directory('jurusan_fotos') // Folder penyimpanan dalam storage
                    ->maxSize(2048) // Ukuran maksimum file (KB)
                    ->required(false), // Tidak wajib diisi
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_jurusan'), 
                TextColumn::make('deskripsi'), 
                TextColumn::make('visi'), 
                TextColumn::make('misi'), 
                TextColumn::make('tujuan'), 
                ImageColumn::make('foto') // Menampilkan foto di tabel
                    ->circular() // Menampilkan gambar berbentuk lingkaran
                    ->height(50) // Tinggi gambar dalam tabel
                    ->width(50), // Lebar gambar dalam tabel
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
            'index' => Pages\ListJurusans::route('/'),
            'create' => Pages\CreateJurusan::route('/create'),
            'edit' => Pages\EditJurusan::route('/{record}/edit'),
        ];
    }
}
