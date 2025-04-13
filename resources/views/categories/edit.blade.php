@extends('main')
@section('content')
    <div style="display: flex; justify-content: center">
        <form class="row align-items-center" style="width: 60%" method="post" action="{{route('update_category', $category)}}">
            @csrf
            @method('PATCH')
            <legend>
                Измените категорию
            </legend>
            <div class="mb-3 max-w-xL">
                <label for="exampleInputEmail1" class=" form-label">Категория</label>
                <input type="text" value="{{$category->title}}" class="form-control {{$errors->has('category') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('category')
                <p>Поле не должно быть пустым</p>
                @enderror
            </div>
            <div class="mb-3">
                <select name="parent_id" class="form-select" aria-label="Default select example">
                    <option @if($category->parent_id == 0) selected @endif value="0"> Без родительской категории </option>
                    @foreach($categories as $category_sec)
                        <option  @if($category->parent_id == $category_sec->id) selected @endif value="{{$category_sec->id}}"> {{$category_sec->title}} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
