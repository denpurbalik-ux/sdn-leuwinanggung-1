<?php

namespace App\Filament\Resources\SchoolPayments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SchoolPaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_type')
                    ->required(),
                TextInput::make('period')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                DatePicker::make('payment_date')
                    ->required(),
                Select::make('payment_method')
                    ->options(['Tunai' => 'Tunai', 'Transfer' => 'Transfer', 'QRIS' => 'Q r i s'])
                    ->required(),
                TextInput::make('receipt_number')
                    ->required(),
                Select::make('status')
                    ->options(['Lunas' => 'Lunas', 'Belum Lunas' => 'Belum lunas', 'Cicilan' => 'Cicilan'])
                    ->default('Lunas')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
