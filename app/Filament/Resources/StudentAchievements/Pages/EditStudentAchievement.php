<?php

namespace App\Filament\Resources\StudentAchievements\Pages;

use App\Filament\Resources\StudentAchievements\StudentAchievementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStudentAchievement extends EditRecord
{
    protected static string $resource = StudentAchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
