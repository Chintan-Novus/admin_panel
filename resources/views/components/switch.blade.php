@props(['name', 'value', 'checked' => null])

<input
    type="checkbox"
    name="{{ $name }}"
    value="{{ $value ?? '' }}"
    {!! $attributes->merge(['class' => 'form-check-input']) !!}
    {{ $checked }}
/>


