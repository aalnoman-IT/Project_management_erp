<?php

namespace App\Filament\Resources\TaskStageResource\Pages;

use App\Filament\Resources\TaskStageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskStages extends ListRecords
{
    protected static string $resource = TaskStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
