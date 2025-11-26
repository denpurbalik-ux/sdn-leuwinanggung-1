<?php

namespace App\Filament\Resources\SchoolPayments\Pages;

use App\Filament\Resources\SchoolPayments\SchoolPaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolPayment extends EditRecord
{
    protected static string $resource = SchoolPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
