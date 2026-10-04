@props(['name', 'label', 'type' => 'text', 'value' => '', 'help' => null])

<label>
    {{ $label }}
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'form-input']) }}
    >
</label>
@error($name)
    <p class="error">{{ $message }}</p>
@enderror
@if ($help)
    <p class="help">{{ $help }}</p>
@endif
