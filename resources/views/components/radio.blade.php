@props(['name', 'value', 'id'])
@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<input
    class="form-check-input"
    type="radio"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value ?? NULL }}"
    {!! $attributes->merge(['class' => 'form-check-input h-20px w-30px']) !!}
/>
