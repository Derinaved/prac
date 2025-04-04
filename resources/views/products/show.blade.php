@extends('main')
@section('content')

    <h1>{{ $product->name }}</h1>

    <p>{{ $product->description }}</p>
    <p>Цена: {{ $product->price }}</p>


    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit" class="btn btn-primary">Добавить в корзину</button>
    </form>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку товаров</a>
@endsection
