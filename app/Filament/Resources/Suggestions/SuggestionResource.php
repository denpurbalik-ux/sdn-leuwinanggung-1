<?php

namespace App\Filament\Resources\Suggestions;

use App\Filament\Resources\Suggestions\Pages\CreateSuggestion;
use App\Filament\Resources\Suggestions\Pages\EditSuggestion;
use App\Filament\Resources\Suggestions\Pages\ListSuggestions;
use App\Filament\Resources\Suggestions\Pages\ViewSuggestion;
use App\Filament\Resources\Suggestions\Schemas\SuggestionForm;
use App\Filament\Resources\Suggestions\Schemas\SuggestionInfolist;
use App\Filament\Resources\Suggestions\Tables\SuggestionsTable;
use App\Models\Suggestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SuggestionResource extends Resource
{
    protected static ?string $model = Suggestion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $navigationLabel = 'Saran & Masukan';
    
    protected static ?string $modelLabel = 'Saran & Masukan';
    
    protected static ?string $pluralModelLabel = 'Laporan Saran & Masukan';
    
    protected static string|UnitEnum|null $navigationGroup = 'Laporan';
    
    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return SuggestionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SuggestionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuggestionsTable::configure($table);
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
            'index' => ListSuggestions::route('/'),
            'create' => CreateSuggestion::route('/create'),
            'view' => ViewSuggestion::route('/{record}'),
            'edit' => EditSuggestion::route('/{record}/edit'),
        ];
    }
}
