<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Все категории
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

     /**
     * Добавить
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        $category->save();
        
        return response()->json('категория успешно сохранена');
    }

    /**
     * Категория с продуктами
     */
    public function show($id)
    {
        $category = Category::where('id', $id)
                ->with('products')
                ->get();
        
        return response()->json($category);
    }


    /**
     * Обновить категорию
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->get();

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        $category->update();
        
        return response()->json('категория успешно обнавлена');
    }

    /**
     * Удалить категорию
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->delete();

        return response()->json('категория успешно удалена');
    }
}
