<?php
namespace App\Filament\Resources\ExpenseResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\ExpenseResource;
use Illuminate\Routing\Router;


class ExpenseApiService extends ApiService
{
    protected static string | null $resource = ExpenseResource::class;

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
