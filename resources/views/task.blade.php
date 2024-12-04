@extends('main')
@section('content')

    <div class="card text-center  w-50 " style="height:550px;">
        <div class="card-header">
            {{$task->title}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Статус {{\App\Models\Status::query()->find($task->statuses_id)->title}}</h5>
            <p class="card-text">{{$task->description}}</p>
            <img src="{{asset('image/'. $task->image)}}" width="300" height="300">
            <a href="{{route('edit_task', $task->id)}}" class="btn btn-primary">Изменить</a>
            @if($task->statuses_id == 1)
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Удалить
                </button>

            @endif
        </div>
        <div class="card-footer text-body-secondary">
            {{$task->created_at}}
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление заявки</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('destroy_task', $task->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='delete' value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Вы уверены что хотите удалить заявку (это необратимый процесс)
                            </label>
                        </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger d-flex">Удалить</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
