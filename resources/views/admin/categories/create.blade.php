@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Добавление категории</h2>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание категории</label>
        <textarea class="form-control" id="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
@endsection
