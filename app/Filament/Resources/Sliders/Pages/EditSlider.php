<?php

namespace App\Filament\Resources\Sliders\Pages;

use App\Filament\Resources\Sliders\SliderResource;
use App\Models\Slider;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSlider extends EditRecord
{
    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_all')
                ->label('Lihat Semua Slider')
                ->icon('heroicon-o-queue-list')
                ->color('gray')
                ->url(fn () => $this->getResource()::getUrl('index') . '?view=table'),
            Action::make('create_new')
                ->label('Tambah Slider')
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
