@extends('main')
@section('content')

    <div>
        <legend>
            Решенные задачи
        </legend>
    </div>
    <body>
    </body>
        <div>
    @foreach(\App\Models\Task::all()->where('statuses_id', '=', '2') as $task)
        <div class="card w-100 mb-3" >
            <div class="card-body">
                <h4 class="card-title">{{$task->title}}</h4>
                <h5>{{\App\Models\Status::query()->find($task->statuses_id)->title}}</h5>
                <p>{{$task->description}}</p>
                <img src="{{asset('image/'. $task->image)}}" width="300" height="300">

            </div>
            <div class="card-footer text-body-secondary">
                {{$task->created_at}}
            </div>
        </div>
    @endforeach
</div>
@endsection
