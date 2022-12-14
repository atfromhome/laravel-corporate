<?php

use Illuminate\Routing\Router;
use FromHome\Corporate\Http\Routes;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(static function (Router $router): void {
    Routes::route();
});
