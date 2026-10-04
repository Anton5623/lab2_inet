@extends('layouts.app')

@section('title', 'Список іспитів')

@section('content')
    <h1>{{ config('lab2.title') }}</h1>

    <p><a href="{{ route('catalog.create') }}">+ Додати іспит</a></p>

    <form method="GET" action="{{ route('catalog.index') }}">
        <label>Пошук: <input name="q" value="{{ $query }}"></label>
        <label>Провайдер: <input name="provider" value="{{ $provider }}"></label>
        <label>Макс. хвилин: <input name="max_minutes" type="number" value="{{ $maxMinutes ?: '' }}"></label>
        <button type="submit">Застосувати</button>
    </form>

    <p>Знайдено: {{ $items->count() }}</p>

    @forelse ($items as $exam)
        <x-certifications.summary :exam="$exam" />
    @empty
        <p>Іспитів не знайдено.</p>
    @endforelse
@endsection
