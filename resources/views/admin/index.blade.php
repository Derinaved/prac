@extends('main')
@section('content')
    <style>
        .card-body {
            display: flex
        ;
            flex-direction: row;
            align-items: center;
        }
        .push{
            margin: 10px ;
        }
    </style>
    <div class="card text-start" style="width: 50%">
        @foreach($orders as $order)
            <div class="card mb-3">
                <div class="card-header">
                    Заказ №{{ $order->id }} от {{ $order->created_at->format('d.m.Y H:i') }}
                    <form action="{{route('update_order', $order)}}" method="post">
                    @csrf
                    @method('PATCH')
                        Статус заказа:
                        <select name="status_id" class="form-select" aria-label="Default select example">
                            @foreach($statuses as $status)
                                <option @if($order->status_id == $status->id) selected @endif value="{{$status->id}}"> {{$status->title}} </option>
                            @endforeach
                        </select>
                        <button class="btn btn-secondary" type="submit">Сохранить</button>
                    </form>
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->price }} руб.</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price * $item->quantity }} руб.</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach



    </div>
@endsection
