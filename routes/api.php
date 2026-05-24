<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Pedidos;
use app\Http\Controllers\ItemPedido;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');


Route::middleware('auth:sanctum')->group(function () {  
});

Route::prefix('produtos')->group(function () {
        Route::get('/', [ItemPedido::class, 'index']);
        Route::post('/', [ItemPedido::class, 'store']);
        Route::get('/{id}', [ItemPedido::class, 'show']);
        Route::put('/{id}', [ItemPedido::class, 'update']);
        Route::delete('/{id}', [ItemPedido::class, 'destroy']);
    });

Route::prefix('pedidos')->group(function () {
        Route::get('/', [Pedidos::class, 'index']);
        Route::post('/', [Pedidos::class, 'store']);
        Route::get('/{id}', [Pedidos::class, 'show']);
        Route::put('/{id}', [Pedidos::class, 'update'])->middleware('pedido.owner');
        Route::delete('/{id}', [Pedidos::class, 'destroy'])->middleware('pedido.owner');
    });

