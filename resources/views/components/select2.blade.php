@props(['name', 'id'])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp
<select
    name="{{ $name }}"
    id="{{ $id }}"
    data-control="select2"
    {!! $attributes->merge(['class' => 'form-select form-select-solid']) !!}>
    {{ $slot }}
</select>
