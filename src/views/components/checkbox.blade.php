@props(['name', 'id','value'])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<input
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value }}"
    type="checkbox"
    {!! $attributes->merge(['class' => 'form-check-input']) !!}
/>


