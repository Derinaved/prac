@extends('main')
@section('content')
    <form class="form" method="post" action="{{route('status_upd_otk', $task->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <fieldset>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Статус</label>
                <input type="text" id="disabledTextInput"  name="statuses_id"  class="form-control" placeholder="Отклоненна">
            </div>
        </fieldset>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
