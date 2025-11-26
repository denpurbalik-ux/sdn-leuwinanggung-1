<?php

namespace App\Filament\Resources\Facilities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class FacilitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('🖼️ Gambar')
                    ->disk('public')
                    ->square()
                    ->size(60),

                TextColumn::make('name')
                    ->label('🏫 Nama Fasilitas')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('description')
                    ->label('📝 Deskripsi')
                    ->limit(50)
                    ->searchable(),

                TextColumn::make('icon')
                    ->label('🎨 Icon')
                    ->html(),

                IconColumn::make('is_active')
                    ->label('✅ Status')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('📊 Urutan')
                    ->sortable()
                    ->alignCenter(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada data fasilitas')
            ->emptyStateDescription('Klik tombol "Buat baru" untuk menambahkan fasilitas sekolah.');
    }
}
