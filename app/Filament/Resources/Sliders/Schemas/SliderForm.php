<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('title')
                    ->label('Judul Slide')
                    ->required()
                    ->maxLength(150),
                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->maxLength(60),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('button_link')
                    ->label('Link Tombol')
                    ->url()
                    ->placeholder('https://...')
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Gambar Banner')
                    ->directory('sliders')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Tampilkan?')
                    ->default(true),
                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
