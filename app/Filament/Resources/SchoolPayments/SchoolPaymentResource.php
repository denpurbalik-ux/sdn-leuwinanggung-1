<?php

namespace App\Filament\Resources\SchoolPayments;

use App\Filament\Resources\SchoolPayments\Pages\CreateSchoolPayment;
use App\Filament\Resources\SchoolPayments\Pages\EditSchoolPayment;
use App\Filament\Resources\SchoolPayments\Pages\ListSchoolPayments;
use App\Filament\Resources\SchoolPayments\Pages\ViewSchoolPayment;
use App\Filament\Resources\SchoolPayments\Schemas\SchoolPaymentForm;
use App\Filament\Resources\SchoolPayments\Schemas\SchoolPaymentInfolist;
use App\Filament\Resources\SchoolPayments\Tables\SchoolPaymentsTable;
use App\Models\SchoolPayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SchoolPaymentResource extends Resource
{
    protected static ?string $model = SchoolPayment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Pembayaran Sekolah';
    
    protected static ?string $modelLabel = 'Pembayaran';
    
    protected static ?string $pluralModelLabel = 'Laporan Pembayaran Sekolah';
    
    protected static string|UnitEnum|null $navigationGroup = 'Laporan';
    
    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return SchoolPaymentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SchoolPaymentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SchoolPaymentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchoolPayments::route('/'),
            'create' => CreateSchoolPayment::route('/create'),
            'view' => ViewSchoolPayment::route('/{record}'),
            'edit' => EditSchoolPayment::route('/{record}/edit'),
        ];
    }
}
