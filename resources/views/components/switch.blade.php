@props(['name', 'value', 'id'])
@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value ?? '' }}"
    {!! $attributes->merge(['class' => 'form-check-input h-20px w-30px']) !!}/>


