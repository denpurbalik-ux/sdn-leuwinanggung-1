<?php

namespace App\Filament\Resources\Extracurriculars\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExtracurricularInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('teacher_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('schedule'),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('max_participants')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('current_participants')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
