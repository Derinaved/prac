@extends('main')
@section('content')
    <style>
        .category{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            width: 70%;
            position: center;
        }
        .card{
            margin: 30px;
        }
        .glv{
            display: flex;
            justify-content: center;
            align-content: center;
        }
        .aaa{
            display: flex;
            flex-direction: column;
        }
    </style>
    <div class="glv">
        <div class="category">
                    @if(!($childs->isEmpty()))
                        @foreach($childs as $child)
                            <div class="card text-bg-secondary mb-5 text-center" style="max-width: 18rem;">
                                <div class="card-header">{{$child->title}}</div>
                                <div class="card-body aaa">
                                    <a href="{{ route('categories.show', $child->id) }}"><img src="/image/category/{{$child->img}}" class="card-img-top" alt=""></a>
                                    <button type="button" class="btn btn-primary"><a class="nav-link" href="{{route('categories.show', $child)}}">Подробнее</a></button>
                                </div>
                            </div>
                        @endforeach
                @else
                    @foreach($products as $product)
                        <div class="card text-bg-secondary mb-5 text-center" style="max-width: 18rem;">
                            <div class="card-header">{{$product->name}}</div>
                            <div class="card-header">{{$product->price}}  ₽</div>
                            <div class="card-body aaa">
                                <a href="{{ route('products.show', $product->id) }}" ><img src="/image/product/{{$product->img}}" class="card-img-top" alt="{{ $product->name }}"> </a>
                                <button type="button" class="btn btn-primary"><a class="nav-link" href="{{route('products.show', $product)}}">Подробнее</a></button>
                            </div>
                        </div>
                    @endforeach
            @endif
        </div>
    </div>
@endsection
