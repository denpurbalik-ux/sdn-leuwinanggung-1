<?php

namespace App\Filament\Resources\BosReports\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BosReportInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('period'),
                TextEntry::make('transaction_date')
                    ->date(),
                TextEntry::make('type')
                    ->badge(),
                TextEntry::make('category'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('receipt_number')
                    ->placeholder('-'),
                TextEntry::make('attachment')
                    ->placeholder('-'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
