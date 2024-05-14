<?php
namespace App\Filament\Resources\ContractResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ContractResource;
use Illuminate\Routing\Router;


class ContractApiService extends ApiService
{
    protected static string | null $resource = ContractResource::class;

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
