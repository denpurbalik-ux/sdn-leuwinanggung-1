<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\FooterSetting;
use Illuminate\Support\Facades\Storage;

class FooterLogoUpload extends Component
{
    use WithFileUploads;

    public $logo;
    public $currentLogo;

    public function mount()
    {
        $footerSetting = FooterSetting::first();
        $this->currentLogo = $footerSetting?->logo_path;
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:2048', // 2MB Max
        ]);

        $footerSetting = FooterSetting::first();
        
        if (!$footerSetting) {
            $footerSetting = FooterSetting::create([
                'about_text' => 'SD Negeri Leuwinanggung 1',
                'copyright_text' => '© 2025',
                'is_active' => true,
            ]);
        }

        // Delete old logo if exists
        if ($footerSetting->logo_path && Storage::disk('public')->exists($footerSetting->logo_path)) {
            Storage::disk('public')->delete($footerSetting->logo_path);
        }

        // Store new logo with original name
        $filename = time() . '_' . $this->logo->getClientOriginalName();
        $path = $this->logo->storeAs('logo', $filename, 'public');

        // Update database
        $footerSetting->logo_path = $path;
        $footerSetting->save();

        $this->currentLogo = $path;
        
        session()->flash('message', 'Logo berhasil diupload!');
        
        // Reset the upload input
        $this->reset('logo');
    }

    public function deleteLogo()
    {
        $footerSetting = FooterSetting::first();
        
        if ($footerSetting && $footerSetting->logo_path) {
            if (Storage::disk('public')->exists($footerSetting->logo_path)) {
                Storage::disk('public')->delete($footerSetting->logo_path);
            }
            
            $footerSetting->logo_path = null;
            $footerSetting->save();
            
            $this->currentLogo = null;
            
            session()->flash('message', 'Logo berhasil dihapus!');
        }
    }

    public function render()
    {
        return view('livewire.footer-logo-upload');
    }
}
