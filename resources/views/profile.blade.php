@extends('main')
@section('content')
    <div>
        <legend>
            Приветствую {{$user->login}}
        </legend>
    </div>
    <form class="form" method="post" action="{{route('task.store')}}">
        @csrf
        <legend>
            Создать новую задачу
        </legend>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class=" form-label">Название</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <select name="worker_id" class="form-select" aria-label="Default select example">
{{--            {{$users = \App\Models\User::all()}}--}}
            <option selected>Выберите работника</option>
            @foreach($users as $user)
                <option  value="{{$user->id}}"> {{$user->login}} </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="cr">
        <div class="cr2">
            <div>
                <legend>
                    Ваши созданные задачи
                </legend>
            </div>
            @foreach($created_tasks as $task)


                <div class="card w-100 mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{$task->title}}</h5>
                        <p class="card-text">Создал: {{\App\Models\User::query()->find($task->user_id)->login}}</p>
                        <p class="card-text">Выполняет: {{\App\Models\User::query()->find($task->worker_id)->login}}</p>
                        <a href="#" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="cr2">
            <div>
                <legend>
                    Ваши рабочие задачи
                </legend>
            </div>

            @foreach($work_tasks as $work_task)

                <div class="card w-100 mb-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{$work_task->title}}</h5>
                        <p class="card-text">Создал: {{\App\Models\User::query()->find($work_task->user_id)->login}}</p>
                        <p class="card-text">Выполняет: {{\App\Models\User::query()->find($work_task->worker_id)->login}}</p>
                        <a href="#" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
