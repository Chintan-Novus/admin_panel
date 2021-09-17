@props([
    'type' => 'submit',
    'id' => 'submit_btn',
    'text',
])

<button type="{{ $type }}" id="{{ $id }}" {!! $attributes->merge(['class' => 'btn']) !!}>
    {{ $slot }}
</button>
