<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->label('🏷️ Label')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('type')
                    ->label('📂 Tipe')
                    ->badge()
                    ->colors([
                        'primary' => 'address',
                        'success' => 'phone',
                        'info' => 'email',
                        'warning' => 'hours',
                        'danger' => 'social',
                        'secondary' => 'other',
                    ])
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'address' => '📍 Alamat',
                        'phone' => '📞 Telepon',
                        'email' => '📧 Email',
                        'hours' => '🕐 Jam Operasional',
                        'social' => '🌐 Media Sosial',
                        'other' => '📌 Lainnya',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('value')
                    ->label('📝 Konten')
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
            ->emptyStateHeading('Belum ada data kontak')
            ->emptyStateDescription('Klik tombol "Buat baru" untuk menambahkan informasi kontak.');
    }
}
