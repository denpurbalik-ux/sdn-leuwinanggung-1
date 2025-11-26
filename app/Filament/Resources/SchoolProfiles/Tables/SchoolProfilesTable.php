<?php

namespace App\Filament\Resources\SchoolProfiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class SchoolProfilesTable
{
    public static function configure(Table $table): Table
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
                    ->limit(50),
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->disk('public')
                    ->size(60)
                    ->defaultImageUrl(url('/images/placeholder.png')),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ]);
    }
}
