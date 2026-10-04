@extends('layouts.app')

@section('title', 'Створити іспит')

@section('content')
    <h1>Створити іспит</h1>

    @if ($errors->any())
        <x-feedback.alert type="error">
            <strong>Помилки:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-feedback.alert>
    @endif

    <form method="POST" action="{{ route('catalog.store') }}">
        @csrf

        <x-form.input name="title" label="Назва" :value="old('title')" />
        <x-form.select name="provider" label="Провайдер" :options="[
            'Amazon' => 'Amazon',
            'Microsoft' => 'Microsoft',
            'Google' => 'Google',
            'Cisco' => 'Cisco',
            'CompTIA' => 'CompTIA',
            'PMI' => 'PMI',
            'AXELOS' => 'AXELOS',
            'Scrum.org' => 'Scrum.org',
            'Oracle' => 'Oracle',
        ]" />
        <x-form.input name="questions" label="Питань" type="number" :value="old('questions')" />
        <x-form.input name="minutes" label="Хвилин" type="number" :value="old('minutes')" />
        <x-form.textarea name="notes" label="Опис" :value="old('notes')" />
        <x-form.checkbox name="urgent" label="Терміново" />

        <div id="justification-block" style="display: none;">
            <x-form.textarea name="justification" label="Обґрунтування" :value="old('justification')" />
        </div>

        <button type="submit">Зберегти</button>
        <a href="{{ route('catalog.index') }}">Скасувати</a>
    </form>

    <script>
        const urgent = document.querySelector('input[name="urgent"]');
        const block = document.getElementById('justification-block');
        const toggle = () => block.style.display = urgent.checked ? 'block' : 'none';
        urgent.addEventListener('change', toggle);
        toggle();
    </script>
@endsection
