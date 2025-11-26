<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SocialMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('name')
                    ->label('🏫 Nama Platform')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Facebook, Instagram, Twitter, YouTube, dll'),

                TextInput::make('icon')
                    ->label('🎨 Icon Class')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('fab fa-facebook-f')
                    ->helperText('Gunakan icon dari Font Awesome, contoh: fab fa-facebook-f, fab fa-instagram, fab fa-twitter'),

                TextInput::make('url')
                    ->label('🔗 URL Link')
                    ->required()
                    ->url()
                    ->maxLength(500)
                    ->placeholder('https://facebook.com/...')
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('📊 Urutan Tampilan')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_active')
                    ->label('✅ Aktif')
                    ->default(true),
            ]);
    }
}
