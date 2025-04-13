@extends('main')
@section('content')
    <div style="display: flex; justify-content: center">
        <form class="row align-items-center" style="width: 60%" method="post" action="{{route('update_product', $product)}}"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <legend>
                Отредактируйте карточку товара
            </legend>
            <div class="mb-3 max-w-xL">
                <label for="exampleInputEmail1" class=" form-label">Название</label>
                <input value="{{$product->name}}" type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 max-w-xL">
                <label for="exampleInputEmail1" class=" form-label">Цена</label>
                <input value="{{$product->price}}" type="text" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 max-w-xL">
                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$product->description}}</textarea>
            </div>
            <select name="category_id" class="form-select mb-3 " aria-label="Default select example">
                @foreach($categories as $category)
                    <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}"> {{$category->title}} </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
