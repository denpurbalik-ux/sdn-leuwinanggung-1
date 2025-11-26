<?php

namespace App\Filament\Resources\StudentAchievements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentAchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('achievement_name')
                    ->required(),
                Select::make('achievement_type')
                    ->options([
            'Akademik' => 'Akademik',
            'Non-Akademik' => 'Non  akademik',
            'Olahraga' => 'Olahraga',
            'Seni' => 'Seni',
            'Lainnya' => 'Lainnya',
        ])
                    ->required(),
                Select::make('level')
                    ->options([
            'Sekolah' => 'Sekolah',
            'Kecamatan' => 'Kecamatan',
            'Kabupaten' => 'Kabupaten',
            'Provinsi' => 'Provinsi',
            'Nasional' => 'Nasional',
            'Internasional' => 'Internasional',
        ])
                    ->required(),
                Select::make('rank')
                    ->options([
            'Juara 1' => 'Juara1',
            'Juara 2' => 'Juara2',
            'Juara 3' => 'Juara3',
            'Harapan 1' => 'Harapan1',
            'Harapan 2' => 'Harapan2',
            'Harapan 3' => 'Harapan3',
            'Peserta' => 'Peserta',
        ])
                    ->required(),
                DatePicker::make('achievement_date')
                    ->required(),
                TextInput::make('organizer')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('certificate')
                    ->default(null),
            ]);
    }
}
