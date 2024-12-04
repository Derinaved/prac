@extends('main')
@section('content')

    <div class="cr">
        <div class="cr2">
            <div>
                <legend>
                    Ваши созданные задачи
                </legend>
            </div>
            @foreach(\App\Models\Task::query()->where('user_id', '=', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->get() as $task)

                <div class="card w-100 mb-3" >
                    <div class="card-body">
                        <h4 class="card-title">{{$task->title}}</h4>
                        <h5>{{\App\Models\Status::query()->find($task->statuses_id)->title}}</h5>
                        <p>{{$task->description}}</p>
                        <img src="{{asset('image/'. $task->image)}}" width="300" height="300">
                        <a href="{{route('show_task', $task->id)}}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>

            @endforeach
        </div
@endsection
