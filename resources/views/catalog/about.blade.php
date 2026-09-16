@extends('layouts.app')

@section('content')
    <h1>Про застосунок</h1>
    <p>Варіант: {{ config('lab2.variant') }}</p>
    <p>Студент: {{ config('lab2.student') }}</p>
    <p>Коефіцієнт: {{ config('lab2.coefficient') }}</p>
    <p>Предметна область: сертифікаційні іспити</p>
    <p>Метод моделі: minutesPerQuestion і intensityLabel</p>
@endsection
