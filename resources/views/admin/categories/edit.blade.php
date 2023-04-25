@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Редактировать категорию</h2>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание категории</label>
            <textarea class="form-control" id="description" name="description" rows="3">{!! $category->description !!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
