<?php

namespace App\Filament\Resources\BosReports\Pages;

use App\Filament\Resources\BosReports\BosReportResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBosReport extends ViewRecord
{
    protected static string $resource = BosReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
