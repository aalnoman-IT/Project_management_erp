<?php
namespace App\Filament\Resources\ProjectMemberResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ProjectMemberResource;
use Illuminate\Routing\Router;


class ProjectMemberApiService extends ApiService
{
    protected static string | null $resource = ProjectMemberResource::class;

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
