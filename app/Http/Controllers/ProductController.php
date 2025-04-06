<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->inRandomOrder()->limit(9)->get();
        return route('home', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
