@props(['name', 'label', 'value' => '', 'rows' => 4])

<label>
    {{ $label }}
    <textarea name="{{ $name }}" rows="{{ $rows }}" {{ $attributes->merge(['class' => 'form-textarea']) }}>{{ old($name, $value) }}</textarea>
</label>
@error($name)
    <p class="error">{{ $message }}</p>
@enderror
