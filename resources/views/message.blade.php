@extends('main')
@section('content')
    <h1>Отзывы</h1>
    <div>
        @foreach($messages as $message)
            <div class="card max-w-xL mb-3" >
                <div class="card-body">
                    <div class="rate">
                        @for($i=1; $i <= $message->rating; $i++)
                            <p class="fa fa-star text-warning"></p>
                        @endfor
                    </div>
                    <h4 class="card-title">{{$message->name}}</h4>
                    <p>{{$message->message}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
