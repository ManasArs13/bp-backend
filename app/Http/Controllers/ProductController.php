<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Все продукты
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Добавить продукт
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;

        $product->save();

        return response()->json('товар успешно сохранён');
    }

    /**
     * Показать продукт
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->get();

        return response()->json($product);
    }

    /**
     * Обновить продукт
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::where('id', $id)->get();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;

        $product->update();

        return response()->json('продукт успешно обнавлен');
    }

    /**
     * Удалить продукт
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->delete();

        return response()->json('продукт успешно удален');
    }
}
