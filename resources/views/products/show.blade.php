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
            <h5 class="card-title">{{$product->name}}
                @auth()
                    @if(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() == 1)
                        <form method="post" action="{{route('destroy_product', $product)}}">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('edit_product', $product)}}" class="btn btn-success">Редактировать</a>
                            <button type="submit" class="btn btn-danger push">Удалить</button>
                        </form>
                    @endif
                @endif
            </h5>
            <img src="/image/product/{{$product->img}}" width="50%"  class=" mx-auto d-block" alt="">
            <p class="card-text">{{ $product->description }}</p>
            <p>Цена: {{ $product->price }}</p>


            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" class="btn btn-primary">Добавить в корзину</button>
            </form>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Посмотреть отзывы
            </button>


            <!-- Modal -->
            <div class="modal" tabindex="-1" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Отзывы</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if(\App\Models\Feedback::where('product_id', $product->id)->get()->isEmpty())
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">У данного товара пока что нет отзывов</h5>
                                    </div>
                                </div>
                            @else
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach(\App\Models\Feedback::where('product_id', $product->id)->get() as $message)

                                    <div class="carousel-item @if($message == \App\Models\Feedback::where('product_id', $product->id)->get()[0]) active @endif">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{\App\Models\User::query()->find($message->user_id)->login}}</h5>
                                                <div class="rate">
                                                    @for($i=1; $i <= $message->rating; $i++)
                                                        <p class="fa fa-star text-warning"></p>
                                                    @endfor
                                                </div>
                                                <p class="card-text">{{$message->message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-secondary">Назад к списку товаров</a>
    </div>
@endsection
