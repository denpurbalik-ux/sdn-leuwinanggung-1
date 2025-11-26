<?php

namespace App\Filament\Resources\Sliders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SlidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public')
                    ->square()
                    ->size(80),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(30),
                TextColumn::make('button_text')
                    ->label('Teks Tombol')
                    ->toggleable()
                    ->limit(20),
                TextColumn::make('button_link')
                    ->label('Link')
                    ->toggleable()
                    ->url(fn ($record) => $record->button_link, true)
                    ->copyable(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
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
