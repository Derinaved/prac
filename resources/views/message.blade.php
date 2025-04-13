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
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() == 1)
                            <form method="post" action="{{route('destroy_message', $message)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger push">Удалить</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
