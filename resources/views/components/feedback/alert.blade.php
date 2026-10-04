@props(['type' => 'success'])

<div class="alert alert-{{ $type }}" role="alert" aria-live="polite">
    {{ $slot }}
</div>
