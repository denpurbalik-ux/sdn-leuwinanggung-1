<?php

namespace App\Filament\Pages;

use App\Models\Slider;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use UnitEnum;

class ManageHomepage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected string $view = 'filament.pages.manage-homepage';

    protected static ?string $navigationLabel = 'Beranda';
    
    protected static string|UnitEnum|null $navigationGroup = 'Konten Situs';

    protected static ?string $title = 'Kelola Halaman Beranda';

    public ?array $data = [];

    public function mount(): void
    {
        $sliders = Slider::orderBy('sort_order')->get();
        
        $this->form->fill([
            'sliders' => $sliders->map(fn ($slider) => [
                'id' => $slider->id,
                'title' => $slider->title,
                'description' => $slider->description,
                'button_text' => $slider->button_text,
                'button_link' => $slider->button_link,
                'image_path' => $slider->image_path,
                'is_active' => $slider->is_active,
                'sort_order' => $slider->sort_order,
            ])->toArray(),
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Repeater::make('sliders')
                ->label('Slider Beranda')
                ->schema([
                    TextInput::make('title')
                        ->label('Judul Slider')
                        ->required()
                        ->maxLength(200)
                        ->columnSpanFull(),
                    
                    Textarea::make('description')
                        ->label('Deskripsi')
                        ->rows(3)
                        ->maxLength(500)
                        ->columnSpanFull(),
                    
                    FileUpload::make('image_path')
                        ->label('Gambar Slider')
                        ->directory('sliders')
                        ->disk('public')
                        ->visibility('public')
                        ->image()
                        ->imageEditor()
                        ->imageEditorMode(2)
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1920')
                        ->imageResizeTargetHeight('1080')
                        ->required()
                        ->maxSize(2048)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                        ->helperText('Rekomendasi: 1920x1080px, maksimal 2MB')
                        ->downloadable()
                        ->openable()
                        ->removeUploadedFileButtonPosition('right')
                        ->uploadButtonPosition('left')
                        ->uploadProgressIndicatorPosition('right')
                        ->columnSpanFull(),
                    
                    TextInput::make('button_text')
                        ->label('Teks Tombol (Opsional)')
                        ->maxLength(50),
                    
                    Toggle::make('is_active')
                        ->label('Tampilkan?')
                        ->default(true)
                        ->inline(false),
                    
                    TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),
                ])
                ->columns(2)
                ->defaultItems(0)
                ->addActionLabel('Tambah Slider')
                ->collapsible()
                ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Slider Baru')
                ->reorderable()
                ->cloneable(),
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
            // Hapus semua slider yang ada
            Slider::query()->delete();

            // Simpan slider baru
            if (isset($data['sliders'])) {
                foreach ($data['sliders'] as $index => $sliderData) {
                    Slider::create([
                        'title' => $sliderData['title'],
                        'description' => $sliderData['description'] ?? null,
                        'button_text' => $sliderData['button_text'] ?? null,
                        'button_link' => $sliderData['button_link'] ?? null,
                        'image_path' => $sliderData['image_path'],
                        'is_active' => $sliderData['is_active'] ?? true,
                        'sort_order' => $sliderData['sort_order'] ?? $index,
                    ]);
                }
            }

            Notification::make()
                ->success()
                ->title('Berhasil disimpan')
                ->body('Data halaman beranda berhasil diperbarui.')
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
