<?php

use Domains\Products\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::name('products.')->group(function () {
    Route::get('/produtos', [ProductController::class, 'index'])->name('index');
});
