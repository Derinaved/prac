<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::where('user_id', Auth::id())->with('product')->get();
        $totalPrice = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout', compact('cart', 'totalPrice'));
    }



    public function store(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }


        $cart = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Ваша корзина пуста. Пожалуйста, добавьте товары для оформления заказа.');
        }




        try {
            DB::beginTransaction();

            $order = new Order([
                'user_id' => Auth::id(),
                'total_price' => $cart->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                }),

                // Добавьте другие поля заказа, если необходимо (например, адрес доставки)

            ]);
            $order->save();


            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,

                ]);
            }


            Cart::where('user_id', Auth::id())->delete();


            DB::commit();




            return redirect()->route('orders.index')->with('success', 'Заказ успешно оформлен!'); // Предполагается, что у вас есть маршрут 'orders.index' для отображения заказов пользователя

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Произошла ошибка при оформлении заказа. Попробуйте позже.');
        }
    }
}
