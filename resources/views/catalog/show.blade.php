@extends('layouts.app')

@section('content')
    <h1>{{ $item->title }}</h1>
    <p>Провайдер: {{ $item->provider }}</p>
    <p>Питань: {{ $item->questions }}</p>
    <p>Хвилин: {{ $item->minutes }}</p>
    <p>Хвилин на питання: {{ $item->minutesPerQuestion() }}</p>
    <p>Інтенсивність: {{ $item->intensityLabel() }}</p>
    <a href="{{ route('catalog.index') }}">← Назад</a>
@endsection
