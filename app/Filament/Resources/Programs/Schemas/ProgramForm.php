<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('title')
                    ->label('📋 Judul Program')
                    ->placeholder('Masukkan judul program...')
                    ->required()
                    ->maxLength(200)
                    ->columnSpanFull()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        if (!empty($state) && empty($get('slug'))) {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        }
                    }),
                
                TextInput::make('slug')
                    ->label('🔗 Slug URL')
                    ->placeholder('url-program-ini')
                    ->required()
                    ->maxLength(200)
                    ->helperText('URL-friendly version dari judul. Otomatis diisi dari judul atau bisa diedit manual.')
                    ->alphaDash()
                    ->columnSpanFull(),
                
                Textarea::make('description')
                    ->label('📝 Deskripsi Singkat')
                    ->placeholder('Masukkan deskripsi singkat program yang menarik...')
                    ->required()
                    ->rows(3)
                    ->maxLength(500)
                    ->minLength(50)
                    ->helperText('Deskripsi menarik yang akan muncul di halaman utama (50-500 karakter).')
                    ->columnSpanFull(),
                
                RichEditor::make('content')
                    ->label('📄 Konten Lengkap')
                    ->placeholder('Tulis konten lengkap program di sini...')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3',
                        'link',
                        'undo',
                        'redo',
                    ])
                    ->columnSpanFull(),
                
                FileUpload::make('image_path')
                    ->label('🖼️ Gambar Program')
                    ->directory('programs')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('Upload gambar menarik untuk program (Max: 2MB, Format: JPG/PNG/WebP)')
                    ->required()
                    ->columnSpanFull(),
                
                DateTimePicker::make('published_at')
                    ->label('📅 Tanggal Publikasi')
                    ->default(now())
                    ->helperText('Kapan program ini dipublikasikan ke website')
                    ->required(),
                
                TextInput::make('sort_order')
                    ->label('🔢 Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->helperText('Angka lebih kecil tampil lebih dulu (0 = paling atas)'),
                
                Toggle::make('is_featured')
                    ->label('⭐ Program Unggulan?')
                    ->helperText('Program unggulan mendapat badge emas dan highlight khusus')
                    ->default(false),
                
                Toggle::make('is_active')
                    ->label('🟢 Aktif?')
                    ->helperText('Hanya program aktif yang tampil di website')
                    ->default(true),
            ]);
    }
}
