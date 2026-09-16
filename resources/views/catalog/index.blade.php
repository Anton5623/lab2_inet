@extends('layouts.app')

@section('content')
    <h1>{{ config('lab2.title') }}</h1>

    <form method="GET" action="{{ route('catalog.index') }}">
        <label>Пошук: <input name="q" value="{{ $query }}"></label>
        <label>Провайдер: <input name="provider" value="{{ $provider }}"></label>
        <label>Макс. хвилин: <input name="max_minutes" type="number" value="{{ $maxMinutes ?: '' }}"></label>
        <button type="submit">Застосувати</button>
    </form>

    <p>Знайдено: {{ $items->count() }}</p>

    @forelse ($items as $item)
        <article>
            <h2><a href="{{ route('catalog.show', $item->slug) }}">{{ $item->title }}</a></h2>
            <p>Провайдер: {{ $item->provider }} | Питань: {{ $item->questions }} | Хвилин: {{ $item->minutes }}</p>
            <p>Хвилин на питання: {{ $item->minutesPerQuestion() }} ({{ $item->intensityLabel() }})</p>
        </article>
    @empty
        <p>Нічого не знайдено.</p>
    @endforelse
@endsection
