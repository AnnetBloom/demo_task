@extends('layout')
<br>
@section('content')
    <h3>Добавить статью</h3>
    @include('_notice')
    @include('_errors')
    <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="content">Контент</label>
            <textarea name="content" id="content" class="form-control" rows="10"></textarea>
        </div>
       @include('_projects_select')
        <div class="mb-3">
            <label for="image">Фото</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection