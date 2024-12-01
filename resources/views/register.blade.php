@extends('main')
@section('content')
    <form class="form" method="post" action="{{route('registerCreate')}}">
        @csrf
        <legend>
            Регистрация
        </legend>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class=" form-label">Логин</label>
            <input type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
