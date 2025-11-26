<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nisn')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Select::make('gender')
                    ->options(['Laki-laki' => 'Laki laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                TextInput::make('birth_place')
                    ->required(),
                DatePicker::make('birth_date')
                    ->required(),
                TextInput::make('grade')
                    ->required(),
                TextInput::make('class')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('parent_name')
                    ->required(),
                TextInput::make('parent_phone')
                    ->tel()
                    ->required(),
                DatePicker::make('entry_year')
                    ->required(),
                Select::make('status')
                    ->options(['Aktif' => 'Aktif', 'Lulus' => 'Lulus', 'Pindah' => 'Pindah', 'Non-Aktif' => 'Non  aktif'])
                    ->default('Aktif')
                    ->required(),
                TextInput::make('photo')
                    ->default(null),
            ]);
    }
}
