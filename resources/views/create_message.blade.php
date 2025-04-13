@extends('main')
@section('content')

    <form class="row gy-2 gx-3 align-items-center" method="post" action="{{route('store_message')}}">
        @csrf
        <legend>
            Оставьте ваш отзыв
        </legend>
        <div class="mb-3 col-auto">
            <label for="exampleInputEmail1" class=" form-label">Имя</label>
            <input type="text" class="form-control {{$errors->has('name') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <p>Поле не должно быть пустым</p>
            @enderror
        </div>
        <div class="mb-3 col-auto">
            <label for="exampleInputEmail1" class=" form-label">Почта</label>
            <input type="text" class="form-control {{$errors->has('email') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
            <p>Поле не должно быть пустым</p>
            @enderror
        </div>
        <div class="mb-3 col-auto">
            <label for="exampleInputEmail1" class=" form-label">Номер телефона</label>
            <input type="text" class="form-control {{$errors->has('phone') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('phone')
            <p>Поле не должно быть пустым</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Отзыв</label>
            <textarea class="form-control {{$errors->has('message') ? 'bg-danger-subtle border-danger-subtle'  : 'bg-primary-subtle border-primary-subtle'}}"  name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('phone')
            <p>Поле не должно быть пустым</p>
            @enderror
        </div>
        <div class="col-sm-6">
            <div class="rate">
                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                <label for="star5" title="text">5 stars</label>
                <input type="radio"  id="star4" class="rate" name="rating" value="4"/>
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" class="rate" name="rating" value="2">
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                <label for="star1" title="text">1 star</label>
            </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить отзыв</button>
    </form>
@endsection
