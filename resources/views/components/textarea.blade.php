@props(['autosize' => 'true', 'name', 'value', 'placeholder', 'id', 'rows' => 3])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<textarea
    name="{{ $name }}"
    id="{{ $id }}"
    placeholder="{{ ucfirst($placeholder) ?? '' }}"
    rows="{{ $rows }}"
    {!! $attributes->merge(['class' => 'form-control form-control-solid']) !!}
    data-kt-autosize="{{ $autosize }}">{{ $value ?? null }}</textarea>
