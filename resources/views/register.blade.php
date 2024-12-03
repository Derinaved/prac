@extends('main')
@section('content')

    <form class="form" method="post" action="{{route('registerCreate')}}">
        @csrf
        <legend>
            Регистрация
        </legend>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class=" form-label">Логин</label>
            <input type="text" value="{{old('login')}}" class="form-control {{$errors->has('login') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('login')
                <p>Поле не должно быть пустым</p>
            @enderror
        </div>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class="form-label">Почта</label>
            <input  type="email" value="{{old('email')}}" class="form-control {{$errors->has('email') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
                <p>Введите коректную почту</p>
            @enderror

        </div>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputEmail1" class=" form-label">ФИО</label>
            <input type="text" value="{{old('name')}}" class="form-control {{$errors->has('name') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        @error('name')
            <p>Поле не должно быть пустым</p>
        @enderror
        </div>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control {{$errors->has('password') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="password" id="exampleInputPassword1">
        @error('password')
            <p>Поле не должно быть пустым</p>
        @enderror
        </div>
        <div class="mb-3 max-w-xL">
            <label for="exampleInputPassword1" class="form-label">Подтвердите пароль</label>
            <input type="password" class="form-control {{$errors->has('password') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="password_confirmation" id="password_confirmation">
        @error('password')
            <p>Пароли не совпадают</p>
        @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input  {{$errors->has('agreement') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" type="checkbox" name="agreement" value="1" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Соглашение на обработку данных
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
    </form>
@endsection
