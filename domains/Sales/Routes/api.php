<?php

use Domains\Sales\Controllers\GetSalesController;
use Illuminate\Support\Facades\Route;

Route::name('sales.')->prefix('vendas')->group(function () {
    Route::get('/', GetSalesController::class)->name('get');
});
