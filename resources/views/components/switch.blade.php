@props(['name', 'value'])

<input
    type="checkbox"
    name="{{ $name }}"
    value="{{ $value ?? '' }}"
    {!! $attributes->merge(['class' => 'form-check-input']) !!}/>


