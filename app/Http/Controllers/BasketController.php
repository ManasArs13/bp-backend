<?php

namespace App\Http\Controllers;

use App\Models\Basket;

class BasketController extends Controller
{

    /**
     * Добавить товар в корзину
     */
    public function addProduct($userId, $productId, $quantity)
    {
        $basket = Basket::firstWhere('user_id', $userId);
        
        $basket->products()->attach($productId, ['quantity' => $quantity]);

        return response()->json('товар добавлен');
    }

    /**
     * Удалить товар из корзины
     */
    public function deleteProduct($userId, $productId)
    {
        $basket = Basket::firstWhere('user_id', $userId);
        
        $basket->products()->detach($productId);

        return response()->json('товар удалён');
    }

    /**
     * Удалить все товары из корзины
     */
    public function cleare($userId)
    {
        $basket = Basket::where('user_id', $userId)
                    ->products()
                    ->detach();

        return response()->json('корзина отчищена');
    }

    /**
     * Все товары в корзине
     */
    public function show($userId)
    {
      $basket = Basket::where('user_id', $userId)
                ->whith('products')
                ->get();
                
        return response()->json($basket);
    }
}
