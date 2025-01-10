<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Filament\Resources\DosenResource\RelationManagers;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn; // Tambahkan impor ini
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationLabel = 'Dosen';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->required()
                ->label('Nama'),
            Forms\Components\TextInput::make('jabatan')
                ->required()
                ->label('Jabatan'),
            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->label('Email'),
            Forms\Components\TextInput::make('linkedin')
                ->nullable()
                ->url()
                ->label('LinkedIn'),
            Forms\Components\TextInput::make('google_scholar')
                ->nullable()
                ->url()
                ->label('Google Scholar'),
            Forms\Components\FileUpload::make('foto')
                ->image()
                ->nullable()
                ->label('Foto'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('jabatan')->label('Jabatan'),
                TextColumn::make('email'),
                TextColumn::make('linkedin'),
                TextColumn::make('google_scholar'),
                ImageColumn::make('foto') // Menampilkan foto di tabel
                    ->circular() // Menampilkan gambar berbentuk lingkaran
                    ->height(50) // Tinggi gambar dalam tabel
                    ->width(50), // Lebar gambar dalam tabel
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
