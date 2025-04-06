<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        $childs = Category::where('parent_id', $category->id)->get();
        if($products->isEmpty()) {
            return (view('categories.show', compact('category', 'childs', 'products')));
        }
        else{
            return (view('categories.show', compact('category', 'childs', 'products')));
        }
    }
}
