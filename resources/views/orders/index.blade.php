@extends('main') {{-- Используйте ваш базовый шаблон --}}

@section('content')
    <div class="container">
        <h1>Мои заказы</h1>

        @if ($orders->isEmpty())
            <p>У вас пока нет заказов.</p>
        @else
            @foreach ($orders as $order)
                <div class="card mb-3">
                    <div class="card-header">
                        Заказ №{{ $order->id }} от {{ $order->created_at->format('d.m.Y H:i') }}
                         Статус заказа:{{  \App\Models\Status::query()->find($order->status_id)->title}}
                        <span class="float-end">Сумма: {{ $order->total_price }} руб.</span>
                    </div>
                    <div class="card-body">
                        <p>Адрес доставки: {{ $order->address }}</p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Название товара</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Сумма</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->price }} руб.</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price * $item->quantity }} руб.</td>
                                    @if($order->status_id == 6)
                                        <td><a href="{{route('create_feedback', $item->product)}}" class="btn btn-success">Оставить отзыв</a></td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
