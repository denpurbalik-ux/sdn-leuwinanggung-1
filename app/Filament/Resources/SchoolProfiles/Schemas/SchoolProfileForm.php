<?php

namespace App\Filament\Resources\SchoolProfiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SchoolProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Select::make('section')
                    ->label('Bagian')
                    ->options([
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'sejarah' => 'Sejarah',
                        'tentang' => 'Tentang Sekolah',
                        'prestasi' => 'Prestasi',
                        'fasilitas' => 'Fasilitas',
                    ])
                    ->required()
                    ->searchable(),
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(200),
                RichEditor::make('content')
                    ->label('Konten')
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
                    ->label('Gambar')
                    ->directory('school-profiles')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->maxSize(2048)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Tampilkan?')
                    ->default(true),
                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
