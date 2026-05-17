<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Pedidos;
use app\Http\Controllers\ItemPedido;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('pedido')->group(function(){
    Route::get('/', [Pedidos::class, 'index']);
    Route::post('/', [Pedidos::class, 'store']);
    Route::get('/{id}', [Pedidos::class, 'show']);
    Route::put('/{id}', [Pedidos::class, 'update']);
    Route::delete('/{id}', [Pedidos::class, 'destroy']);
});

Route::prefix('itemPedido')->group(function(){
    Route::get('/', [ItemPedido::class, 'index']);
    Route::post('/', [ItemPedido::class, 'store']);
    Route::get('/{id}', [ItemPedido::class, 'show']);
    Route::put('/{id}', [ItemPedido::class, 'update']);
    Route::delete('/{id}', [ItemPedido::class, 'destroy']);
});

