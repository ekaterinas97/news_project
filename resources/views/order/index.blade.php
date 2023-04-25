@extends('layouts.main')
    @section('content')
        <h1>Заказ на получение выгрузки данных </h1>
        <a href="{{ route('order.create') }}" class="btn btn-info">Заказать</a>
    @endsection

