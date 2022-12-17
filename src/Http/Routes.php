<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use FromHome\Corporate\Http\Controllers\BranchController;
use FromHome\Corporate\Http\Controllers\DivisionController;
use FromHome\Corporate\Http\Controllers\EmployeeController;
use FromHome\Corporate\Http\Controllers\PositionController;

final class Routes
{
    public static function route(): void
    {
        self::employee();
        self::branch();
        self::division();
        self::position();
    }

    public static function employee(): void
    {
        Route::prefix('/employee')->group(static function (Router $router): void {
            $router->get('/', [EmployeeController::class, 'index']);
            $router->get('/{employeeId}', [EmployeeController::class, 'show']);
            $router->put('/{employeeId}', [EmployeeController::class, 'update']);
            $router->post('/', [EmployeeController::class, 'store']);
            $router->patch('/{employeeId}/disable', [EmployeeController::class, 'delete']);
            $router->patch('/{employeeId}/enable', [EmployeeController::class, 'restore']);
        });
    }

    public static function branch(): void
    {
        Route::prefix('/branch')->group(static function (Router $router): void {
            $router->get('/', [BranchController::class, 'index']);
            $router->get('/{branchId}', [BranchController::class, 'show']);
        });
    }

    public static function division(): void
    {
        Route::prefix('/division')->group(static function (Router $router): void {
            $router->get('/', [DivisionController::class, 'index']);
            $router->get('/{divisionId}', [DivisionController::class, 'show']);
        });
    }

    public static function position(): void
    {
        Route::prefix('/position')->group(static function (Router $router): void {
            $router->get('/', [PositionController::class, 'index']);
            $router->get('/{positionId}', [PositionController::class, 'show']);
        });
    }
}
