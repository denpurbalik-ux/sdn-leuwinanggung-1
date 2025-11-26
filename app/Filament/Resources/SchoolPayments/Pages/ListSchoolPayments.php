<?php

namespace App\Filament\Resources\SchoolPayments\Pages;

use App\Filament\Resources\SchoolPayments\SchoolPaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSchoolPayments extends ListRecords
{
    protected static string $resource = SchoolPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
