@props(['name', 'label', 'checked' => false])

<label class="checkbox-label">
    <input
        type="checkbox"
        name="{{ $name }}"
        value="1"
        @checked(old($name, $checked))
        {{ $attributes->merge(['class' => 'form-checkbox']) }}
    >
    {{ $label }}
</label>
@error($name)
    <p class="error">{{ $message }}</p>
@enderror
