@extends('layouts.app')

@section('title', $item->title)

@section('content')
    <h1>{{ $item->title }}</h1>
    <p><strong>Провайдер:</strong> {{ $item->provider }}</p>
    <p><strong>Питань:</strong> {{ $item->questions }}</p>
    <p><strong>Хвилин:</strong> {{ $item->minutes }}</p>
    <p><strong>Хвилин на питання:</strong> {{ $item->minutesPerQuestion() }}</p>
    <p><strong>Інтенсивність:</strong> {{ $item->intensityLabel() }}</p>
    @if ($item->notes)
        <p><strong>Опис:</strong> {{ $item->notes }}</p>
    @endif
    @if ($item->urgent)
        <p><strong>Терміново:</strong> {{ $item->justification }}</p>
    @endif

    <p>
        <a href="{{ route('catalog.edit', $item->slug) }}">Редагувати</a> |
        <a href="{{ route('catalog.confirm-delete', $item->slug) }}">Видалити</a> |
        <a href="{{ route('catalog.index') }}">← Назад</a>
    </p>
@endsection
