@props(['name', 'value'])

<input
    class="form-check-input"
    type="radio"
    name="{{ $name }}"
    value="{{ $value ?? NULL }}"
    {!! $attributes->merge(['class' => 'form-check-input']) !!}
/>
