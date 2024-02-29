<?php

use Domains\Sales\Controllers\AddProductsToSaleController;
use Domains\Sales\Controllers\CancelSaleController;
use Domains\Sales\Controllers\CreateSaleController;
use Domains\Sales\Controllers\GetSaleController;
use Domains\Sales\Controllers\GetSalesController;
use Illuminate\Support\Facades\Route;

Route::name('sales.')->prefix('vendas')->group(function () {
    Route::get('/', GetSalesController::class)->name('get-all');
    Route::post('/', CreateSaleController::class)->name('create');
    Route::get('/{sale}', GetSaleController::class)->name('get');
    Route::post('/{sale}/cancelar', CancelSaleController::class)->name('cancel');
    Route::post('/{sale}/adicionar-produtos', AddProductsToSaleController::class)->name('add-products');
});
