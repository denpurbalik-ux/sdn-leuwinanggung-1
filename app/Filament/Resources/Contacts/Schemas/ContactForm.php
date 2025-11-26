<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('label')
                    ->label('🏷️ Label')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Alamat, Telepon, Email, dll'),

                Select::make('type')
                    ->label('📂 Tipe Kontak')
                    ->options([
                        'address' => '📍 Alamat',
                        'phone' => '📞 Telepon',
                        'email' => '📧 Email',
                        'hours' => '🕐 Jam Operasional',
                        'social' => '🌐 Media Sosial',
                        'other' => '📌 Lainnya',
                    ])
                    ->required()
                    ->default('other'),

                TextInput::make('icon')
                    ->label('🎨 Icon (Emoji/Class)')
                    ->maxLength(255)
                    ->placeholder('📍 atau fas fa-map-marker-alt'),

                TextInput::make('link')
                    ->label('🔗 Link (Opsional)')
                    ->url()
                    ->maxLength(500)
                    ->placeholder('https://...'),

                TextInput::make('sort_order')
                    ->label('📊 Urutan Tampilan')
                    ->numeric()
                    ->default(0)
                    ->required(),

                Toggle::make('is_active')
                    ->label('✅ Aktif')
                    ->default(true),

                Textarea::make('value')
                    ->label('📝 Konten')
                    ->required()
                    ->rows(3)
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ]);
    }
}
