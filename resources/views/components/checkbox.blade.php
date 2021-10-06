@props(['name','value'])

<input
    name="{{ $name }}"
    value="{{ $value }}"
    type="checkbox"
    {!! $attributes->merge(['class' => 'form-check-input']) !!}
/>


