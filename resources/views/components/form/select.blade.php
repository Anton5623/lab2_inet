@props(['name', 'label', 'options' => [], 'selected' => ''])

<label>
    {{ $label }}
    <select name="{{ $name }}" {{ $attributes->merge(['class' => 'form-select']) }}>
        <option value="">— Оберіть —</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected(old($name, $selected) == $value)>{{ $text }}</option>
        @endforeach
    </select>
</label>
@error($name)
    <p class="error">{{ $message }}</p>
@enderror
