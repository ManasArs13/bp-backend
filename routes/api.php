<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Роуты для товаров и категорий
 */
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);


/**
 *   Роуты для добавления, удаления и очиски корзины
 */
Route::get('/addproduct/{userId}/{productId}/{quantity}', [BasketController::class, 'addProduct']);
Route::get('/deleteproduct/{userId}/{productId}/', [BasketController::class, 'deleteProduct']);
Route::get('/cleare/{userId}/', [BasketController::class, 'cleare']);
Route::get('/basket', [BasketController::class, 'show']);