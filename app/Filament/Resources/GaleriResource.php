<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Filament\Resources\GaleriResource\RelationManagers;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->label('Judul'),
            Forms\Components\FileUpload::make('file')
                ->required()
                ->label('File')
                ->directory('posts/images')
                ->image()
                ->maxSize(10000) // Ukuran maksimum dalam KB (10MB)
                ->nullable()
                ->rules(['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'])
                ->afterStateUpdated(function ($state, $set, $record) {
                    if ($record) {
                        $record->addMedia($state)->toMediaCollection('images');
                    }
                }),
            Forms\Components\TextInput::make('caption')
                ->required()
                ->label('Caption'),
            Forms\Components\Select::make('tipe')
                ->options([
                    'Foto' => 'Foto',
                    'Video' => 'Video',
                ])
                ->required()
                ->label('Tipe'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul'),
                Tables\Columns\TextColumn::make('tipe'),
                Tables\Columns\TextColumn::make('caption'),
                ImageColumn::make('media.file.first.url') // Display the first image in the collection
                ->label('Image')
                ->size(50),
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
