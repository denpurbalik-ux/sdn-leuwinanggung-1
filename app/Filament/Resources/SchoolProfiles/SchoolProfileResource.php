<?php

namespace App\Filament\Resources\SchoolProfiles;

use App\Filament\Resources\SchoolProfiles\Pages\CreateSchoolProfile;
use App\Filament\Resources\SchoolProfiles\Pages\EditSchoolProfile;
use App\Filament\Resources\SchoolProfiles\Pages\ListSchoolProfiles;
use App\Models\SchoolProfile;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class SchoolProfileResource extends Resource
{
    protected static ?string $model = SchoolProfile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Profil Sekolah';
    protected static string|UnitEnum|null $navigationGroup = 'Konten Situs';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $pluralModelLabel = 'Profil Sekolah';
    protected static ?string $modelLabel = 'Profil Sekolah';

    public static function form(Schema $schema): Schema
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
                    ->searchable()
                    ->helperText('Pilih bagian dari profil sekolah yang akan ditampilkan di halaman /profil')
                    ->columnSpanFull(),
                
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(200)
                    ->helperText('Contoh: "Visi Kami" atau "Sejarah SD Negeri Leuwinanggung 1"')
                    ->columnSpanFull(),
                
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
                    ->helperText('Isi konten dengan detail informasi yang ingin ditampilkan')
                    ->columnSpanFull(),
                
                FileUpload::make('image_path')
                    ->label('Gambar (Opsional)')
                    ->directory('school-profiles')
                    ->disk('public')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->maxSize(2048)
                    ->helperText('Maksimal 2MB, format: JPG, PNG, WEBP')
                    ->columnSpanFull(),
                
                Toggle::make('is_active')
                    ->label('Tampilkan di Website?')
                    ->default(true)
                    ->helperText('Aktifkan untuk menampilkan konten ini di halaman profil')
                    ->inline(false),
                
                TextInput::make('sort_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka lebih kecil akan ditampilkan lebih dulu')
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section')
                    ->label('Bagian')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'visi' => 'Visi',
                        'misi' => 'Misi',
                        'sejarah' => 'Sejarah',
                        'tentang' => 'Tentang Sekolah',
                        'prestasi' => 'Prestasi',
                        'fasilitas' => 'Fasilitas',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'visi' => 'success',
                        'misi' => 'info',
                        'sejarah' => 'warning',
                        'tentang' => 'primary',
                        'prestasi' => 'danger',
                        'fasilitas' => 'gray',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) > 50) {
                            return $state;
                        }
                        return null;
                    }),
                
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->disk('public')
                    ->size(60)
                    ->defaultImageUrl(url('/images/placeholder.png')),
                
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable()
                    ->alignCenter(),
                
                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum Ada Data Profil Sekolah')
            ->emptyStateDescription('Klik tombol "Buat" untuk menambahkan konten profil sekolah.')
            ->emptyStateIcon('heroicon-o-academic-cap');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchoolProfiles::route('/'),
            'create' => CreateSchoolProfile::route('/create'),
            'edit' => EditSchoolProfile::route('/{record}/edit'),
        ];
    }
}
