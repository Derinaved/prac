@extends('main')
@section('content')
<h1>Оформление заказа</h1>

<form action="{{ route('checkout.store') }}" method="post">
    @csrf
    <!-- Поля формы для имени, адреса и т.д. -->
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <!-- ... другие поля -->
    <button type="submit" class="btn btn-primary">Подтвердить заказ</button>
</form>
@endsection
