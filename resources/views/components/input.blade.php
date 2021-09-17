@props(['type' => 'text', 'name', 'value', 'placeholder', 'id'])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ $value ?? null }}" {!! $attributes->merge(['class' => 'form-control form-control-solid']) !!}
/>
