<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::where('user_id', Auth::id())->with('product')->get(); // Получаем товары из корзины для текущего пользователя
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            $cart = new Cart([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
            $cart->save();
        }

        return redirect()->back()->with('success', 'Товар добавлен в корзину.');
    }



    public function update(Request $request, Cart $cart)
    {
        // Здесь $cart уже загружен по id из маршрута

        if (!Auth::check() || $cart->user_id != Auth::id()) {
            // Если пользователь не авторизован или пытается изменить чужую корзину
            abort(403); // Возвращаем ошибку 403 Forbidden
        }

        $cart->quantity = $request->input('quantity');
        $cart->save();


        return redirect()->route('cart.index', compact('cart'));
    }



    public function remove(Request $request, Cart $cart) // Изменено: теперь принимаем модель Cart
    {
        if (!Auth::check() || $cart->user_id != Auth::id()) {
            // Если пользователь не авторизован или пытается изменить чужую корзину
            abort(403); // Возвращаем ошибку 403 Forbidden
        }

        $cart->delete();

        return redirect()->route('cart.index', compact('cart'));
    }

}
