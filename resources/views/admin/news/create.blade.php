@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Добавить новость</h2>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="0">--Выбрать--</option>
                @foreach($categories as $category)
                    <option @if((int)old('category_id') === $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-control" id="status" name="status">
                <option value="0">--Выбрать--</option>
                @foreach($statusList as $status)
                    <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
