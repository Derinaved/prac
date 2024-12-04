@extends('main')
@section('content')
    <form class="form" method="post" action="{{route('status_upd_ok', $task->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <fieldset>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Статус</label>
            <input type="text" id="disabledTextInput"  name="statuses_id"  class="form-control" placeholder="Решена">
        </div>
        </fieldset>
        <div class="input-group mb-3">
            <label class="input-group-text"  for="inputGroupFile01">Upload</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
