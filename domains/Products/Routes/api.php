<?php

use Domains\Products\Controllers\GetProductsController;
use Domains\Products\Controllers\RenderProductsController;
use Illuminate\Support\Facades\Route;

Route::name('products.')->prefix('produtos')->group(function () {
    Route::get('/', GetProductsController::class)->name('get');
});
