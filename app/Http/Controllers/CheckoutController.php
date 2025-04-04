<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        // Проверка авторизации
        if (!Auth::check()) {
            return redirect()->route('login'); // Или другой маршрут для входа
        }

        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = session()->get('cart');

        if (empty($cart)) {
            return redirect()->route('cart.index');
        }


        // Валидация данных формы (добавьте необходимые правила валидации)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // ... другие поля
        ]);


        DB::beginTransaction(); // Начало транзакции

        try {
            // Создаем новый заказ
            $order = new Order();
            $order->user_id = Auth::id();
            $order->total_price = 0; // Инициализируем общую цену
            $order->status = 'pending';
            // Добавьте другие поля заказа, если необходимо (например, адрес доставки)
            $order->fill($validatedData); // Заполняем поля данными из формы
            $order->save();

            // Добавляем товары из корзины в заказ
            foreach ($cart as $productId => $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $productId;
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->save();

                // Обновляем общую цену заказа
                $order->total_price += $item['price'] * $item['quantity'];
            }

            $order->save(); // Сохраняем заказ с обновленной ценой

            DB::commit(); // Подтверждаем транзакцию

            session()->forget('cart'); // Очищаем корзину

            return redirect()->route('thankyou');


        } catch (\Exception $e) {
            DB::rollBack(); // Откатываем транзакцию в случае ошибки
            // Обработка ошибки, например, логирование или вывод сообщения об ошибке
            return redirect()->back()->withErrors(['message' => 'Произошла ошибка при оформлении заказа. Попробуйте позже.']);
        }
    }
}
