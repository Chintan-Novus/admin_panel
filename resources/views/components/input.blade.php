@props(['type' => 'text', 'name', 'value' => null, 'placeholder' => null, 'id'])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    placeholder="{{ ucfirst($placeholder) ?? '' }}"
    value="{{ $value }}" {!! $attributes->merge(['class' => 'form-control form-control-solid']) !!}
/>
