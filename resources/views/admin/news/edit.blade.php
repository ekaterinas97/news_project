@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактировать новость</h2>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="category_ids" class="form-label">Категория</label>
            <select class="form-control" id="category_ids" name="category_ids[]" multiple>
                <option value="0">--Выбрать--</option>
                @foreach($categories as $category)
                    <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Автор</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-control" id="status" name="status">
                <option value="0">--Выбрать--</option>
                @foreach($statusList as $status)
                    <option @if($news->status === $status) selected @endif>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{!! $news->description !!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
