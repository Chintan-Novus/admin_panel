@props(['name', 'id'])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp
<select
    name="{{ $name }}"
    id="{{ $id }}"
    {!! $attributes->merge(['class' => 'form-select form-select-solid']) !!}>
    {{ $slot }}
</select>
