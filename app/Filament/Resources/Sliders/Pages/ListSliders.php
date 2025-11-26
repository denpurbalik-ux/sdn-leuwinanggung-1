<?php

namespace App\Filament\Resources\Sliders\Pages;

use App\Filament\Resources\Sliders\SliderResource;
use App\Models\Slider;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Http\Request;

class ListSliders extends ListRecords
{
    protected static string $resource = SliderResource::class;

    public function mount(): void
    {
        parent::mount();
        
        // Cek apakah ada query parameter untuk menampilkan tabel
        if (request()->query('view') !== 'table') {
            // Auto redirect ke edit jika ada data, atau create jika kosong
            $firstSlider = Slider::orderBy('sort_order')->first();
            
            if ($firstSlider) {
                redirect()->route('filament.admin.resources.sliders.edit', ['record' => $firstSlider->id]);
            } else {
                redirect()->route('filament.admin.resources.sliders.create');
            }
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Slider Baru')
                ->icon('heroicon-o-plus'),
        ];
    }
}
