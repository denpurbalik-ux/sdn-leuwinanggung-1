<?php

namespace App\Filament\Resources\BosReports\Pages;

use App\Filament\Resources\BosReports\BosReportResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBosReport extends EditRecord
{
    protected static string $resource = BosReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
