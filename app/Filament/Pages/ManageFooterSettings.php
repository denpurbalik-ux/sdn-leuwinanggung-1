<?php

namespace App\Filament\Pages;

use App\Models\FooterSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageFooterSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAdjustmentsHorizontal;

    protected string $view = 'filament.pages.manage-footer-settings';

    protected static ?string $navigationLabel = 'Pengaturan Footer';
    protected static string|UnitEnum|null $navigationGroup = 'Konten Situs';
    protected static ?int $navigationSort = 4;

    public ?array $data = [];

    public function mount(): void
    {
        $footerSetting = FooterSetting::first();
        
        if (!$footerSetting) {
            $footerSetting = FooterSetting::create([
                'about_text' => 'SD Negeri Leuwinanggung 1 adalah sekolah dasar negeri yang berkomitmen memberikan pendidikan berkualitas untuk generasi masa depan.',
                'copyright_text' => '© 2025 SD Negeri Leuwinanggung 1. All Rights Reserved.',
                'is_active' => true,
            ]);
        }

        $this->data = [
            'logo_path' => $footerSetting->logo_path ? [$footerSetting->logo_path] : [],
            'logo_name' => $footerSetting->logo_name,
            'about_text' => $footerSetting->about_text,
            'copyright_text' => $footerSetting->copyright_text,
            'map_embed_url' => $footerSetting->map_embed_url,
        ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                FileUpload::make('logo_path')
                    ->label('🖼️ Logo Sekolah')
                    ->image()
                    ->imageEditor()
                    ->maxSize(2048)
                    ->disk('public')
                    ->directory('logo')
                    ->visibility('public')
                    ->helperText('Upload logo sekolah (Max 2MB). File akan disimpan di storage/app/public/logo'),

                TextInput::make('logo_name')
                    ->label('🏫 Nama Sekolah')
                    ->required()
                    ->maxLength(255)
                    ->default('SD Negeri Leuwinanggung 1')
                    ->helperText('Nama sekolah yang ditampilkan di samping logo'),

                Textarea::make('about_text')
                    ->label('📝 Tentang Kami')
                    ->required()
                    ->rows(4)
                    ->maxLength(500)
                    ->helperText('Teks deskripsi singkat tentang sekolah yang ditampilkan di footer'),

                TextInput::make('copyright_text')
                    ->label('©️ Copyright Text')
                    ->required()
                    ->maxLength(255)
                    ->default('© 2025 SD Negeri Leuwinanggung 1. All Rights Reserved.'),

                Textarea::make('map_embed_url')
                    ->label('🗺️ Google Maps Embed')
                    ->rows(3)
                    ->helperText('Paste kode HTML iframe Google Maps di sini'),
            ]);
    }

    public function save(): void
    {
        $state = $this->form->getState();
        
        $footerSetting = FooterSetting::first();
        
        if (!$footerSetting) {
            $footerSetting = new FooterSetting();
        }

        // Convert logo_path array to string
        if (isset($state['logo_path']) && is_array($state['logo_path'])) {
            if (!empty($state['logo_path'])) {
                // New file uploaded
                $state['logo_path'] = $state['logo_path'][0];
            } else {
                // No file, keep existing
                $state['logo_path'] = $footerSetting->logo_path;
            }
        }
        
        $footerSetting->fill($state);
        $footerSetting->is_active = true;
        $footerSetting->save();
        
        $this->data = [
            'logo_path' => $footerSetting->logo_path ? [$footerSetting->logo_path] : [],
            'logo_name' => $footerSetting->logo_name,
            'about_text' => $footerSetting->about_text,
            'copyright_text' => $footerSetting->copyright_text,
            'map_embed_url' => $footerSetting->map_embed_url,
        ];

        Notification::make()
            ->success()
            ->title('Berhasil disimpan')
            ->body('Pengaturan footer berhasil diperbarui.')
            ->send();
    }
}
