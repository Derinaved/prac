<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get(); // Загружаем заказы пользователя с элементами заказа и связанными товарами
        return view('orders.index', compact('orders'));
    }
}
