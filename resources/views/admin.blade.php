@extends('main')
@section('content')
    <div>
        <a class="btn btn-success btn-lg" href="{{route('create_tasks')}}">Создать новую карточку товара</a>
        <a class="btn btn-success btn-lg" href="{{route('show_category')}}">Управление категориями</a>
        <a class="btn btn-success btn-lg" href="{{route('index_orders')}}">Просмотр заказов</a>
    <div>

@endsection
