@extends('layouts.app')

@section('title', 'Редагувати іспит')

@section('content')
    <h1>Редагувати: {{ $item->title }}</h1>

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

    <form method="POST" action="{{ route('catalog.update', $item->slug) }}">
        @csrf
        @method('PATCH')

        <x-form.input name="title" label="Назва" :value="$item->title" />
        <x-form.select name="provider" label="Провайдер" :selected="$item->provider" :options="[
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
        <x-form.input name="questions" label="Питань" type="number" :value="$item->questions" />
        <x-form.input name="minutes" label="Хвилин" type="number" :value="$item->minutes" />
        <x-form.textarea name="notes" label="Опис" :value="$item->notes" />
        <x-form.checkbox name="urgent" label="Терміново" :checked="$item->urgent" />

        <div id="justification-block" style="display: none;">
            <x-form.textarea name="justification" label="Обґрунтування" :value="$item->justification" />
        </div>

        <button type="submit">Оновити</button>
        <a href="{{ route('catalog.show', $item->slug) }}">Скасувати</a>
    </form>

    <script>
        const urgent = document.querySelector('input[name="urgent"]');
        const block = document.getElementById('justification-block');
        const toggle = () => block.style.display = urgent.checked ? 'block' : 'none';
        urgent.addEventListener('change', toggle);
        toggle();
    </script>
@endsection
