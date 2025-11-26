<?php

namespace App\Filament\Resources\BosReports\Pages;

use App\Filament\Resources\BosReports\BosReportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBosReports extends ListRecords
{
    protected static string $resource = BosReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
