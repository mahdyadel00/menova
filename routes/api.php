<?php

use App\Helpers\Router\RouterHelper;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    RouterHelper::includeRouteFiles(__DIR__ . '/api/v1');
});