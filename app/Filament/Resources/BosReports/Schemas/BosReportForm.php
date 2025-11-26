<?php

namespace App\Filament\Resources\BosReports\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BosReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('period')
                    ->required(),
                DatePicker::make('transaction_date')
                    ->required(),
                Select::make('type')
                    ->options(['Pemasukan' => 'Pemasukan', 'Pengeluaran' => 'Pengeluaran'])
                    ->required(),
                TextInput::make('category')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('receipt_number')
                    ->default(null),
                TextInput::make('attachment')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
