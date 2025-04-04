@extends('main')
@section('content')
    <div class="container mt-5">
        <h1>Корзина</h1>

        @if(empty($cart))
            <p>Ваша корзина пуста.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Перейти к покупкам</a>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php $totalPrice = 0; @endphp
                @foreach($cart as $productId => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PUT') <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control w-25 me-2">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Обновить</button>
                            </form>
                        </td>
                        <td>{{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @php $totalPrice += $item['price'] * $item['quantity']; @endphp
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="mb-0"><strong>Итого:</strong> {{ $totalPrice }}</p>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Оформить заказ</a>
            </div>
        @endif

    </div>
@endsection
