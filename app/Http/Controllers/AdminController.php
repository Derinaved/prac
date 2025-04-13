<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function show()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function destroy(Category $category)
    {
        $products = Product::query()->where('category_id', '=', $category->id)->get();
        foreach ($products as $product) {
            $product->delete();
        }
        $category->delete();
        return redirect()->route('filter');
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string',
                'parent_id' => 'required'
            ]);
        Category::create($data);
        return redirect()->route('filter');
    }
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->only('title', 'parent_id');
        $category->title = $data['title'];
        $category->parent_id = $data['parent_id'];

        $category->save();

        return redirect()->route('show_category');
    }

    public function indexOrder()
    {
        $orders = Order::all();
        $statuses = Status::all();
        return view('admin.index', compact('orders', 'statuses'));
    }

    public function updateOrder(Request $request, Order $order)
    {
        $data =  $request->only('status_id');
        $order->status_id = $data['status_id'];
        $order->save();

        return redirect()->route('index_orders');
    }

    public function destroyMessage(Message $message)
    {
        $message->delete();
        return redirect()->route('show_all_message');
    }

    public function editProduct(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = $request->only([
            'name',
            'price',
            'description',
            'category_id',
        ]);
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        $product->category_id = $data['category_id'];
        $product->save();

        return redirect()->route('products.show', compact('product'));
    }

    public function destroyProduct(Product $product)
    {
        $product->delete();

        return redirect()->route('home');
    }

}
