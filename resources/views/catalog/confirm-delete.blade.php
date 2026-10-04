@extends('layouts.app')

@section('title', 'Підтвердити видалення')

@section('content')
    <h1>Видалити іспит?</h1>
    <p><strong>{{ $item->title }}</strong> ({{ $item->provider }})</p>
    <p>Цю дію не можна скасувати.</p>

    <form method="POST" action="{{ route('catalog.destroy', $item->slug) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Так, видалити</button>
        <a href="{{ route('catalog.show', $item->slug) }}">Скасувати</a>
    </form>
@endsection
