<?php

namespace App\Filament\Resources\BosReports;

use App\Filament\Resources\BosReports\Pages\CreateBosReport;
use App\Filament\Resources\BosReports\Pages\EditBosReport;
use App\Filament\Resources\BosReports\Pages\ListBosReports;
use App\Filament\Resources\BosReports\Pages\ViewBosReport;
use App\Filament\Resources\BosReports\Schemas\BosReportForm;
use App\Filament\Resources\BosReports\Schemas\BosReportInfolist;
use App\Filament\Resources\BosReports\Tables\BosReportsTable;
use App\Models\BosReport;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BosReportResource extends Resource
{
    protected static ?string $model = BosReport::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;

    protected static ?string $navigationLabel = 'Dana BOS';
    
    protected static ?string $modelLabel = 'Dana BOS';
    
    protected static ?string $pluralModelLabel = 'Laporan Dana BOS';
    
    protected static string|UnitEnum|null $navigationGroup = 'Laporan';
    
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return BosReportForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BosReportInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BosReportsTable::configure($table);
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
            'index' => ListBosReports::route('/'),
            'create' => CreateBosReport::route('/create'),
            'view' => ViewBosReport::route('/{record}'),
            'edit' => EditBosReport::route('/{record}/edit'),
        ];
    }
}
