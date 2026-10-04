@props(['exam', 'showActions' => true])

<article class="exam-summary" data-urgent="{{ $exam->urgent ? '1' : '0' }}">
    <h2>
        <a href="{{ route('catalog.show', $exam->slug) }}">{{ $exam->title }}</a>
    </h2>
    <p>
        <strong>{{ $exam->provider }}</strong> |
        Питань: {{ $exam->questions }} |
        Хвилин: {{ $exam->minutes }}
    </p>
    <p>
        Хвилин на питання: <strong>{{ $exam->minutesPerQuestion() }}</strong>
        ({{ $exam->intensityLabel() }})
    </p>

    {{ $slot }}

    @if ($showActions)
        <p class="actions">
            <a href="{{ route('catalog.edit', $exam->slug) }}">Редагувати</a> |
            <a href="{{ route('catalog.confirm-delete', $exam->slug) }}">Видалити</a>
        </p>
    @endif
</article>
