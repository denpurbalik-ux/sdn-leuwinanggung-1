<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('name')
                    ->label('🏫 Nama Fasilitas')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('icon')
                    ->label('🎨 Icon (Emoji/Class)')
                    ->maxLength(255)
                    ->placeholder('🏫 atau bi bi-building'),

                TextInput::make('sort_order')
                    ->label('📊 Urutan Tampilan')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_active')
                    ->label('✅ Aktif')
                    ->default(true),

                Textarea::make('description')
                    ->label('📝 Deskripsi Singkat')
                    ->required()
                    ->rows(3)
                    ->maxLength(500)
                    ->columnSpanFull(),

                FileUpload::make('image_path')
                    ->label('🖼️ Gambar Fasilitas')
                    ->image()
                    ->directory('image')
                    ->disk('public')
                    ->imageEditor()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
