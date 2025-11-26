<?php

namespace App\Filament\Resources\SchoolProfiles\Pages;

use App\Filament\Resources\SchoolProfiles\SchoolProfileResource;
use App\Models\SchoolProfile;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Http\Request;

class ListSchoolProfiles extends ListRecords
{
    protected static string $resource = SchoolProfileResource::class;

    public function mount(): void
    {
        parent::mount();
        
        // Cek apakah ada query parameter untuk menampilkan tabel
        if (request()->query('view') !== 'table') {
            // Auto redirect ke edit jika ada data, atau create jika kosong
            $firstProfile = SchoolProfile::orderBy('sort_order')->first();
            
            if ($firstProfile) {
                redirect()->route('filament.admin.resources.school-profiles.edit', ['record' => $firstProfile->id]);
            } else {
                redirect()->route('filament.admin.resources.school-profiles.create');
            }
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->label('Tambah Konten Baru')
                ->icon('heroicon-o-plus'),
        ];
    }
}
