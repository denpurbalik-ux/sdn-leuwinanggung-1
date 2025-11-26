<?php

namespace App\Filament\Resources\SocialMedia\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class SocialMediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('🏫 Platform')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('icon')
                    ->label('🎨 Icon')
                    ->html()
                    ->formatStateUsing(fn (string $state): string => "<i class='$state text-xl'></i>"),

                TextColumn::make('url')
                    ->label('🔗 URL')
                    ->limit(40)
                    ->searchable(),

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
            ->emptyStateHeading('Belum ada sosial media')
            ->emptyStateDescription('Klik tombol "Buat baru" untuk menambahkan link sosial media.');
    }
}
