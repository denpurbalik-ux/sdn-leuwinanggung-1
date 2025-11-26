<?php

namespace App\Filament\Pages;

use App\Models\SchoolProfile;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use UnitEnum;

class ManageSchoolProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected string $view = 'filament.pages.manage-school-profile';

    protected static ?string $navigationLabel = 'Profil Sekolah';
    
    protected static string|UnitEnum|null $navigationGroup = 'Konten Situs';

    protected static ?string $title = 'Kelola Profil Sekolah';

    public ?array $data = [];

    public function mount(): void
    {
        $profiles = SchoolProfile::all()->groupBy('section');
        
        $this->form->fill([
            // Visi
            'visi_title' => $profiles->get('visi')?->first()?->title ?? 'Visi',
            'visi_content' => $profiles->get('visi')?->first()?->content ?? '',
            
            // Misi
            'misi_title' => $profiles->get('misi')?->first()?->title ?? 'Misi',
            'misi_content' => $profiles->get('misi')?->first()?->content ?? '',
            
            // Tentang
            'tentang_title' => $profiles->get('tentang')?->first()?->title ?? 'Tentang Sekolah',
            'tentang_content' => $profiles->get('tentang')?->first()?->content ?? '',
            'tentang_image' => $profiles->get('tentang')?->first()?->image_path ?? null,
            
            // Sejarah
            'sejarah_title' => $profiles->get('sejarah')?->first()?->title ?? 'Sejarah',
            'sejarah_content' => $profiles->get('sejarah')?->first()?->content ?? '',
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Placeholder::make('profil_heading')
                ->label('Bagian')
                ->content('📋 PROFIL SEKOLAH')
                ->columnSpanFull()
                ->extraAttributes(['class' => 'text-lg font-bold text-blue-700 dark:text-blue-300 border-b-2 border-blue-200 pb-2']),

            TextInput::make('tentang_title')
                ->label('Judul Profil')
                ->default('Tentang Sekolah')
                ->required()
                ->maxLength(200)
                ->columnSpanFull(),
            
            RichEditor::make('tentang_content')
                ->label('Konten Profil')
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'bulletList',
                    'orderedList',
                    'link',
                ])
                ->columnSpanFull(),
            
            FileUpload::make('tentang_image')
                ->label('Gambar Gedung Sekolah')
                ->directory('school-profiles')
                ->disk('public')
                ->image()
                ->imageEditor()
                ->maxSize(2048)
                ->helperText('Gambar ini akan ditampilkan di bagian header profil')
                ->columnSpanFull(),

            Placeholder::make('visi_heading')
                ->label('Bagian')
                ->content('🎯 VISI SEKOLAH')
                ->columnSpanFull()
                ->extraAttributes(['class' => 'text-lg font-bold text-green-700 dark:text-green-300 border-b-2 border-green-200 pb-2 mt-8']),

            TextInput::make('visi_title')
                ->label('Judul Visi')
                ->default('Visi')
                ->required()
                ->maxLength(200)
                ->columnSpanFull(),
            
            RichEditor::make('visi_content')
                ->label('Konten Visi')
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'bulletList',
                    'orderedList',
                    'link',
                ])
                ->columnSpanFull(),

            Placeholder::make('misi_heading')
                ->label('Bagian')
                ->content('🚀 MISI SEKOLAH')
                ->columnSpanFull()
                ->extraAttributes(['class' => 'text-lg font-bold text-purple-700 dark:text-purple-300 border-b-2 border-purple-200 pb-2 mt-8']),

            TextInput::make('misi_title')
                ->label('Judul Misi')
                ->default('Misi')
                ->required()
                ->maxLength(200)
                ->columnSpanFull(),
            
            RichEditor::make('misi_content')
                ->label('Konten Misi')
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'bulletList',
                    'orderedList',
                    'link',
                ])
                ->helperText('Gunakan bullet list untuk menampilkan misi dalam bentuk poin')
                ->columnSpanFull(),

            Placeholder::make('sejarah_heading')
                ->label('Bagian')
                ->content('📚 SEJARAH SEKOLAH')
                ->columnSpanFull()
                ->extraAttributes(['class' => 'text-lg font-bold text-orange-700 dark:text-orange-300 border-b-2 border-orange-200 pb-2 mt-8']),

            TextInput::make('sejarah_title')
                ->label('Judul Sejarah')
                ->default('Sejarah')
                ->required()
                ->maxLength(200)
                ->columnSpanFull(),
            
            RichEditor::make('sejarah_content')
                ->label('Konten Sejarah')
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'bulletList',
                    'orderedList',
                    'link',
                ])
                ->columnSpanFull(),
        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function save(): void
    {
        $data = $this->form->getState();

        try {
            $sections = ['visi', 'misi', 'tentang', 'sejarah'];

            foreach ($sections as $index => $section) {
                SchoolProfile::updateOrCreate(
                    ['section' => $section],
                    [
                        'title' => $data["{$section}_title"],
                        'content' => $data["{$section}_content"],
                        'image_path' => $section === 'tentang' ? ($data["{$section}_image"] ?? null) : null,
                        'is_active' => true, // Set default is_active
                        'sort_order' => $index,
                    ]
                );
            }

            Notification::make()
                ->success()
                ->title('Berhasil disimpan')
                ->body('Data profil sekolah berhasil diperbarui.')
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Gagal menyimpan')
                ->body('Terjadi kesalahan: ' . $e->getMessage())
                ->send();
        }
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Simpan Perubahan')
                ->action('save')
                ->icon('heroicon-o-check'),
        ];
    }
}
