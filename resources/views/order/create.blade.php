@extends('layouts.main')
@section('content')
    <h1>Заполнение формы</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('order.store') }}">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Ваше имя</label>
            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('title') }}">

        </div>
        <div class="mb-3">
            <label for="user_phone" class="form-label">Телефон</label>
            <input type="tel" class="form-control @error('user_phone') is-invalid @enderror" id="user_phone" name="user_phone" value="{{ old('author') }}">
        </div>
        <div class="mb-3">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="user_email" name="user_email" value="{{ old('author') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Какие данные вам нужны</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

@endsection

