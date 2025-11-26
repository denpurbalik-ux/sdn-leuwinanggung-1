<?php

namespace App\Filament\Resources\SchoolProfiles\Pages;

use App\Filament\Resources\SchoolProfiles\SchoolProfileResource;
use App\Models\SchoolProfile;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSchoolProfile extends EditRecord
{
    protected static string $resource = SchoolProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_all')
                ->label('Lihat Semua Konten')
                ->icon('heroicon-o-queue-list')
                ->color('gray')
                ->url(fn () => $this->getResource()::getUrl('index') . '?view=table'),
            Action::make('create_new')
                ->label('Tambah Konten')
                ->icon('heroicon-o-plus')
                ->color('success')
                ->url(fn () => $this->getResource()::getUrl('create')),
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
