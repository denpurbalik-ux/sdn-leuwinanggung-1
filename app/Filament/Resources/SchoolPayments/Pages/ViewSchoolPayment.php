<?php

namespace App\Filament\Resources\SchoolPayments\Pages;

use App\Filament\Resources\SchoolPayments\SchoolPaymentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSchoolPayment extends ViewRecord
{
    protected static string $resource = SchoolPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
