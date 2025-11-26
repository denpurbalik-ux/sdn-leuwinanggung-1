<?php

namespace App\Filament\Resources\Extracurriculars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExtracurricularForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('teacher_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('schedule')
                    ->required(),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('max_participants')
                    ->numeric()
                    ->default(null),
                TextInput::make('current_participants')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('status')
                    ->options(['Aktif' => 'Aktif', 'Non-Aktif' => 'Non  aktif'])
                    ->default('Aktif')
                    ->required(),
            ]);
    }
}
