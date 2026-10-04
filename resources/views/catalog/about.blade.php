@extends('layouts.app')

@section('title', 'Про застосунок')

@section('content')
    <h1>Про застосунок</h1>
    <p><strong>Варіант:</strong> {{ config('lab2.variant') }}</p>
    <p><strong>Студент:</strong> {{ config('lab2.student') }}</p>
    <p><strong>Предметна область:</strong> Сертифікаційні іспити</p>
    <p><strong>titleMax:</strong> {{ config('lab2.title_max') }}</p>
    <p><strong>notesMin:</strong> {{ config('lab2.notes_min') }}</p>
    <p><strong>jsThreshold:</strong> {{ config('lab2.js_threshold') }}</p>
@endsection
