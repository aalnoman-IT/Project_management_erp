<?php
namespace App\Filament\Resources\TaskStageResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TaskStageResource;
use Illuminate\Routing\Router;


class TaskStageApiService extends ApiService
{
    protected static string | null $resource = TaskStageResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
