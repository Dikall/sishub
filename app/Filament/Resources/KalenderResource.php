<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KalenderResource\Pages;
use App\Filament\Resources\KalenderResource\RelationManagers;
use App\Models\Kalender;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KalenderResource extends Resource
{
    protected static ?string $model = Kalender::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul') 
                    ->required(), 
                Forms\Components\DatePicker::make('tanggal_mulai') 
                    ->required(), 
                Forms\Components\DatePicker::make('tanggal_selesai') 
                    ->required(), 
                Forms\Components\Textarea::make('keterangan') 
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul'),
                TextColumn::make('tanggal_mulai'),
                TextColumn::make('tanggal_selesai'),
                TextColumn::make('keterangan'),
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
            'index' => Pages\ListKalenders::route('/'),
            'create' => Pages\CreateKalender::route('/create'),
            'edit' => Pages\EditKalender::route('/{record}/edit'),
        ];
    }
}
