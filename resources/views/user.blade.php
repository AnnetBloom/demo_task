@extends('layout')
<br>
@section('content')
    <h3>Добавить пользователя</h3>
    @include('_notice')
    @include('_errors')
    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="headline">Заголовок</label>
            <input type="text" class="form-control" name="headline" id="headline">
        </div>
        <div class="mb-3">
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
        @include('_projects_select')
        <div class="mb-3">
            <label for="image">Фото</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection