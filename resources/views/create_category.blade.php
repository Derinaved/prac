@extends('main')
@section('content')
    <form class="form" method="post" action="{{route('store_category')}}">
        @csrf
        <legend>
            Новая категория
        </legend>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class=" form-label">Категория</label>
            <input type="text" class="form-control {{$errors->has('category') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('category')
            <p>Поле не должно быть пустым</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
