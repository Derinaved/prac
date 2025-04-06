@extends('main')
@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Популярные товары</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/image/product/{{$product->img}}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ Str::limit($product->description, 150) }}</p>
                                <p class="card-text">Цена: {{ $product->price }} руб.</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
