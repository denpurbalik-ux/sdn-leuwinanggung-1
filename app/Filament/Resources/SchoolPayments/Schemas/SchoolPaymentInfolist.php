<?php

namespace App\Filament\Resources\SchoolPayments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SchoolPaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('student_id')
                    ->numeric(),
                TextEntry::make('payment_type'),
                TextEntry::make('period'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('payment_date')
                    ->date(),
                TextEntry::make('payment_method')
                    ->badge(),
                TextEntry::make('receipt_number'),
                TextEntry::make('status')
                    ->badge(),
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
