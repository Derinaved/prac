@extends('main')
@section('content')

    <div>
        <legend>
            Задачи
        </legend>
    </div>
    <body>
    <img src="/public/images/4.png" alt="" width="420" , height="420">
    </body>
        <div>
{{--    @foreach($tasks as $task)--}}
{{--        <div class="card w-100 mb-3" >--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">{{$task->title}}</h5>--}}
{{--                <p class="card-text">Создал: {{\App\Models\User::query()->find($task->user_id)->login}}</p>--}}
{{--                <p class="card-text">Выполняет: {{\App\Models\User::query()->find($task->worker_id)->login}}</p>--}}
{{--                <p class="card-text">Создано: {{$task->created_at}}</p>--}}
{{--                <a href="#" class="btn btn-primary">Подробнее</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
</div>
@endsection
