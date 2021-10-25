@props(['name', 'value', 'checked' => null])

<input
    class="form-check-input"
    type="radio"
    name="{{ $name }}"
    value="{{ $value ?? NULL }}"
    {!! $attributes->merge(['class' => 'form-check-input']) !!}
    {{ $checked }}
/>
