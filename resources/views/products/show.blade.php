@extends('main')
@section('content')
    <style>
        .card{
            display: block;
            position: center;
            margin-top: 30px;
            left: 25%;
        }
    </style>
    <div class="card" style="width: 50%;">
        <div class="card-body ">
            <h5 class="card-title">{{$product->name}}</h5>
            <img src="/image/product/{{$product->img}}" alt="">
            <p class="card-text">{{ $product->description }}</p>
            <p>Цена: {{ $product->price }}</p>


            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" class="btn btn-primary">Добавить в корзину</button>
            </form>
        </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-secondary">Назад к списку товаров</a>
@endsection
