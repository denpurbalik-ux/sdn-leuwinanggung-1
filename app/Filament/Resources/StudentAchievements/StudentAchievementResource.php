<?php

namespace App\Filament\Resources\StudentAchievements;

use App\Filament\Resources\StudentAchievements\Pages\CreateStudentAchievement;
use App\Filament\Resources\StudentAchievements\Pages\EditStudentAchievement;
use App\Filament\Resources\StudentAchievements\Pages\ListStudentAchievements;
use App\Filament\Resources\StudentAchievements\Pages\ViewStudentAchievement;
use App\Filament\Resources\StudentAchievements\Schemas\StudentAchievementForm;
use App\Filament\Resources\StudentAchievements\Schemas\StudentAchievementInfolist;
use App\Filament\Resources\StudentAchievements\Tables\StudentAchievementsTable;
use App\Models\StudentAchievement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StudentAchievementResource extends Resource
{
    protected static ?string $model = StudentAchievement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTrophy;

    protected static ?string $navigationLabel = 'Prestasi Siswa';
    
    protected static ?string $modelLabel = 'Prestasi';
    
    protected static ?string $pluralModelLabel = 'Data Prestasi Siswa';
    
    protected static string|UnitEnum|null $navigationGroup = 'Laporan';
    
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return StudentAchievementForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StudentAchievementInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentAchievementsTable::configure($table);
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
            'index' => ListStudentAchievements::route('/'),
            'create' => CreateStudentAchievement::route('/create'),
            'view' => ViewStudentAchievement::route('/{record}'),
            'edit' => EditStudentAchievement::route('/{record}/edit'),
        ];
    }
}
