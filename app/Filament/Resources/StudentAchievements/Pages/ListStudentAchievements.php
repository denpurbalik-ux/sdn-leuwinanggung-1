<?php

namespace App\Filament\Resources\StudentAchievements\Pages;

use App\Filament\Resources\StudentAchievements\StudentAchievementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentAchievements extends ListRecords
{
    protected static string $resource = StudentAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
