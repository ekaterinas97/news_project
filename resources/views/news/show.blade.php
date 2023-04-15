@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="card-img-top" src="{{ $news['image'] }}" alt="{{ $news['title'] }}">
                        <div class="card-body">
                            <h4>{{ $news['title'] }}</h4>
                            <p class="card-text">{!! $news['description'] !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', ['id' => $news['id']]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                <small class="text-body-secondary">{{ $news['author'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
