<?php
use App\Http\Controllers\CarritoController;

Route::get('/carrito', [CarritoController::class, 'index']);
Route::get('/carrito/{id}', [CarritoController::class, 'show']);
Route::get('/carrito/usuario/{id}', [CarritoController::class, 'porUsuario']);
Route::post('/carrito', [CarritoController::class, 'store']);
Route::put('/carrito/{id}', [CarritoController::class, 'update']);
Route::delete('/carrito/{id}', [CarritoController::class, 'destroy']);


use App\Http\Controllers\DetalleCarritoController;

Route::get('/detalle-carrito', [DetalleCarritoController::class, 'index']);
Route::get('/detalle-carrito/{id}', [DetalleCarritoController::class, 'show']);
Route::get('/detalle-carrito/carrito/{id}', [DetalleCarritoController::class, 'porCarrito']);
Route::post('/detalle-carrito', [DetalleCarritoController::class, 'store']);
Route::put('/detalle-carrito/{id}', [DetalleCarritoController::class, 'update']);
Route::delete('/detalle-carrito/{id}', [DetalleCarritoController::class, 'destroy']);


use App\Http\Controllers\PersonalizacionController;

Route::prefix('personalizaciones')->group(function () {
    Route::get('/', [PersonalizacionController::class, 'index']);
    Route::get('/{id}', [PersonalizacionController::class, 'show']);
    Route::post('/', [PersonalizacionController::class, 'store']);
    Route::put('/{id}', [PersonalizacionController::class, 'update']);
    Route::delete('/{id}', [PersonalizacionController::class, 'destroy']);
});


use App\Http\Controllers\CategoriaController;

Route::prefix('categorias')->group(function(){
    Route::get('/', [CategoriaController::class, 'index']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::post('/', [CategoriaController::class, 'store']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});


use App\Http\Controllers\ProductoController;

Route::prefix('productos')->group(function(){
    Route::get('/', [ProductoController::class, 'index']);
    Route::get('/{id}', [ProductoController::class, 'show']);
    Route::post('/', [ProductoController::class, 'store']);
    Route::put('/{id}', [ProductoController::class, 'update']);
    Route::delete('/{id}', [ProductoController::class, 'destroy']);
});


use App\Http\Controllers\UsuarioController;

Route::prefix('usuarios')->group(function(){
    Route::get('/', [UsuarioController::class, 'index']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::put('/{id}', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});


use App\Http\Controllers\DetallePedidoController;

Route::prefix('detalle-pedidos')->group(function(){
    Route::get('/', [DetallePedidoController::class, 'index']);
    Route::get('/{id}', [DetallePedidoController::class, 'show']);
    Route::post('/', [DetallePedidoController::class, 'store']);
    Route::put('/{id}', [DetallePedidoController::class, 'update']);
    Route::delete('/{id}', [DetallePedidoController::class, 'destroy']);
});
