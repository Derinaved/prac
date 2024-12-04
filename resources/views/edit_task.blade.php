@extends('main')
@section('content')

    <form class="form" method="post" action="{{route('update_task', $task->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <legend>
        Измените Данные
        </legend>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class=" form-label">Название</label>
            <input type="text" class="form-control" value="{{$task->title}}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
            <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{$task->description}}</textarea>
        </div>
        <select name="categories_id" class="form-select" aria-label="Default select example">
            <option selected>Выберите категорию</option>
            @foreach(\App\Models\Category::all() as $category)
                <option  value="{{$category->id}}"> {{$category->title}} </option>
            @endforeach
        </select>
        <div class="input-group mb-3">
            <label class="input-group-text"  for="inputGroupFile01">Upload</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
