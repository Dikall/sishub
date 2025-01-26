<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QrResource\Pages;
use App\Models\Qr;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use SimpleSoftwareIO\QrCode\Facades\QrCode as SimpleQrCode;

class QrResource extends Resource
{
    protected static ?string $model = Qr::class;

    protected static ?string $navigationLabel = 'QR Code';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->label('Judul QR Code'),
            Forms\Components\TextInput::make('detail')
                ->required()
                ->label('Detail QR Code'),
            Forms\Components\TextInput::make('url')
                ->required()
                ->label('URL Link')
                ->placeholder('Enter the URL here')
                ->url(),
            Forms\Components\ViewField::make('qr_code')
                ->label('Generated QR Code')
                ->view('components.qr-code', [
                    'url' => fn ($record) => $record->url ?? '', // Menggunakan string URL langsung
                ]),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('judul'),
            Tables\Columns\TextColumn::make('detail'),
            Tables\Columns\TextColumn::make('url'),
            Tables\Columns\ViewColumn::make('qr_code')
                ->label('QR Code')
                ->view('components.qr-code', [
                    'url' => fn ($record) => $record->url ?? '', // Menggunakan string URL langsung
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->label('Show QR Code')
                    ->icon('heroicon-o-clipboard')
                    ->url(fn ($record) => route('qr.show', $record)),
            
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQrs::route('/'),
            'create' => Pages\CreateQr::route('/create'),
            'edit' => Pages\EditQr::route('/{record}/edit'),
        ];
    }
}
