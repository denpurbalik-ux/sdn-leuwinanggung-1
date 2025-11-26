<?php

namespace App\Filament\Resources\Suggestions\Pages;

use App\Filament\Resources\Suggestions\SuggestionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSuggestion extends ViewRecord
{
    protected static string $resource = SuggestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
