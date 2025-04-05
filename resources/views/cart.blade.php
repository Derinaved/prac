@extends('main')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container mt-5">
        <h1><i class="fas fa-shopping-cart"></i> Корзина</h1>

        @if($cart->isEmpty())
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
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->price }} руб.</td>
                        <td>
                            <form action="{{ route('cart.update', $item) }}" method="post" class="d-flex align-items-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control w-25 me-2">
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Обновить</button>
                            </form>
                        </td>
                        <td>{{ $item->product->price * $item->quantity }} руб.</td>
                        <td>
                            <form action="{{ route('cart.remove', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @php $totalPrice += $item->product->price * $item->quantity; @endphp
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="mb-0"><strong>Итого:</strong> {{ $totalPrice }} руб.</p>
                <a href="{{ route('checkout.index') }}" class="btn btn-success">Оформить заказ</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
