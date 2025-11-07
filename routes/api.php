<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\DetallePedidoController;
use App\Http\Controllers\Api\PagoController;

Route::apiResource('pedidos', PedidoController::class);
Route::apiResource('detalle-pedidos', DetallePedidoController::class);
Route::apiResource('pagos', PagoController::class);
