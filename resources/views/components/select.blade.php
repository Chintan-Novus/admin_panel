@props(['name'])

<select
    name="{{ $name }}"
    {!! $attributes->merge(['class' => 'form-select form-select-solid']) !!}>
    {{ $slot }}
</select>
