@extends('main')
@section('content')
    <style>
        .card-body {
            display: flex
        ;
            flex-direction: row;
            align-items: center;
        }
        .push{
            margin: 10px ;
        }
    </style>
    <div class="card text-start" style="width: 30%">
        <a href="{{route('create_category')}}" class="btn btn-success push">Создать новую категорию</a>
        @foreach($categories as $category)
            <div class="card-body">
                <h5 class="card-title">{{$category->title}}</h5>
                <a href="{{route('edit_category', $category)}}" class="btn btn-success push">Изменить</a>
                <form method="post" action="{{route('destroy_category', $category)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger push">Удалить</button>
                </form>
            </div>
        @endforeach



    </div>
@endsection
