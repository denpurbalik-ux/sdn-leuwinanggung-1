<?php

namespace App\Filament\Resources\Suggestions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SuggestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                Select::make('type')
                    ->options([
            'Saran' => 'Saran',
            'Masukan' => 'Masukan',
            'Keluhan' => 'Keluhan',
            'Pertanyaan' => 'Pertanyaan',
        ])
                    ->required(),
                TextInput::make('subject')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(['Baru' => 'Baru', 'Diproses' => 'Diproses', 'Selesai' => 'Selesai'])
                    ->default('Baru')
                    ->required(),
                Textarea::make('response')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('responded_at'),
            ]);
    }
}
