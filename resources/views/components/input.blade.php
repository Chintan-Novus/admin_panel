@props(['type' => 'text', 'name', 'value' => null, 'placeholder' => null])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    placeholder="{{ ucfirst($placeholder) ?? '' }}"
    value="{{ $value }}" {!! $attributes->merge(['class' => 'form-control form-control-solid']) !!}
/>
