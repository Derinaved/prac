@extends('main')
@section('content')
<form class="form" method="post" action="{{route('authentication')}}">
    @csrf
    <legend>
        Вход
    </legend>
    <div class="mb-3 max-w-xL">
        <label for="exampleInputEmail1" class=" form-label">Логин</label>
        <input type="text" class="form-control {{$errors->has('login') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('login')
        <p>{{$message}}</p>
    @enderror
    </div>
    <div class="mb-3 max-w-xL">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
