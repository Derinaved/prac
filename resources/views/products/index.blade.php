@extends('main')
@section('content')

<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Цена: {{ $product->price }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
