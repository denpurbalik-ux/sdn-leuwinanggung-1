<?php

namespace App\Filament\Resources\Staff\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nip')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Select::make('gender')
                    ->options(['Laki-laki' => 'Laki laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                Textarea::make('address')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('position')
                    ->required(),
                TextInput::make('education')
                    ->default(null),
                DatePicker::make('join_date')
                    ->required(),
                Select::make('status')
                    ->options(['Aktif' => 'Aktif', 'Cuti' => 'Cuti', 'Non-Aktif' => 'Non  aktif'])
                    ->default('Aktif')
                    ->required(),
                TextInput::make('photo')
                    ->default(null),
            ]);
    }
}
