<?php

namespace App\Filament\Resources\StudentAchievements\Pages;

use App\Filament\Resources\StudentAchievements\StudentAchievementResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStudentAchievement extends ViewRecord
{
    protected static string $resource = StudentAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
