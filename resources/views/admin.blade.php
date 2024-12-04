@extends('main')
@section('content')
    <div class="d-flex">
        <form  method="get" action="{{route('filter')}}" class="m-5">
            @csrf
            <select name="statuses_id" class="form-select m-2" aria-label="Default select example">
                <option selected>Статус заявки</option>
            @foreach(\App\Models\Status::all() as $state)
                    <option  value="{{$state->id}}"> {{$state->title}} </option>
            @endforeach
            </select>
            <button type="submit" class="btn btn-success m-2">Отсортировать</button>
        </form>
        <button type="button" class="btn btn-primary m-5 " data-bs-toggle="modal" data-bs-target="#exampleModaldel">
             Редактировать категории
        </button>
    </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Категории</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <a href="{{route('create_category')}}" class="btn btn-primary">Создать новую категорию</a>
                    <ul class="list-group">
                        @foreach(\App\Models\Category::all() as $category)
                            <li class="list-group-item">{{$category->title}} <a href="{{route('delete', $category->id)}}" type="button" class="btn btn-danger">Удалить</a></li>
                        @endforeach
                    </ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        @foreach($tasks as $task)
            <div class="card w-100 mb-3" >
                <div class="card-body">
                    <h4 class="card-title">{{$task->title}}</h4>
                    <h5>{{\App\Models\Status::query()->find($task->statuses_id)->title}}</h5>
                    <p>{{$task->description}}</p>
                    <img src="{{asset('image/'. $task->image)}}" width="600" height="300">
                    @if($task->statuses_id != 3)
                        <button type="button" class="btn btn-primary m-5 " data-bs-toggle="modal" data-bs-target="#exampleModal{{$task->id}}">
                            Подробнее
                        </button>
                    @endif
                </div>
            </div>
            <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Статус</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <h5 class="modal-title m-3">Изменить статус</h5>
                        <a href="{{route('status_ok', $task->id)}}" class="btn btn-primary m-5">Решена</a>
                        <a href="{{route('status_otk', $task->id)}}" class="btn btn-primary m-5">Отклонена</a>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
