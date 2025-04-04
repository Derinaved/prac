<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) { // Проверяем, авторизован ли пользователь
            return redirect()->route('login'); // Перенаправляем на страницу входа
        }

        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) { // Проверяем, авторизован ли пользователь
            return redirect()->route('login'); // Перенаправляем на страницу входа
        }

        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            // Здесь нужно получить информацию о товаре, например, из базы данных
            $product = Product::find($product_id);
            if (!$product) {
                return redirect()->back()->with('error', 'Товар не найден');
            }
            $cart[$product_id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function update(Request $request, $productId)
    {
        if (!Auth::check()) { // Проверяем, авторизован ли пользователь
            return redirect()->route('login'); // Перенаправляем на страницу входа
        }

        $cart = session()->get('cart');

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $productId)
    {
        if (!Auth::check()) { // Проверяем, авторизован ли пользователь
            return redirect()->route('login'); // Перенаправляем на страницу входа
        }

        $cart = session()->get('cart');


        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

}
