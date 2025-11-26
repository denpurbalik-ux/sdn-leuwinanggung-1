<?php

namespace App\Filament\Resources\StudentAchievements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentAchievementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_id')
                    ->numeric(),
                TextEntry::make('achievement_name'),
                TextEntry::make('achievement_type')
                    ->badge(),
                TextEntry::make('level')
                    ->badge(),
                TextEntry::make('rank')
                    ->badge(),
                TextEntry::make('achievement_date')
                    ->date(),
                TextEntry::make('organizer')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('certificate')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
