@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome to Admin Panel!</h1>
    </div>
    @php $message = "I'm message! Hello!" @endphp
    <x-alert type="primary" :message="$message"></x-alert>
@endsection
