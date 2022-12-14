<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use FromHome\Corporate\Http\Controllers\EmployeeController;

final class Routes
{
    public static function route(): void
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
}
