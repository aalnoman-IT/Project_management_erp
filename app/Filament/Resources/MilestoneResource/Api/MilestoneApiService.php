<?php
namespace App\Filament\Resources\MilestoneResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\MilestoneResource;
use Illuminate\Routing\Router;


class MilestoneApiService extends ApiService
{
    protected static string | null $resource = MilestoneResource::class;

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
