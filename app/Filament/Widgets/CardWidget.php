<?php

namespace App\Filament\Widgets;
use App\Models\Contract;
use App\Models\Project;
use App\Models\Task;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CardWidget extends BaseWidget
{
    // protected static ?string $pollingInterval = null;
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::count())
            ->description('All projects')
            ->descriptionIcon('heroicon-o-folder-open', IconPosition::Before)
            ->chart([1,10,2,20,3,30,4,40])
            ->color('success'),
            Stat::make('Tasks', Task::count())
            ->description('All tasks')
            ->descriptionIcon('heroicon-o-check', IconPosition::Before)
            ->chart([1,10,2,20,3,30,4,40])
            ->color('info'),
            Stat::make('Contracts', Contract::count())
            ->description('All contracts')
            ->descriptionIcon('heroicon-o-clipboard-document-check', IconPosition::Before)
            ->chart([1,10,2,20,3,30,4,40])
            ->color('primary')
        ];
    }
}
