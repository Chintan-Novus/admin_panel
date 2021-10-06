@props(['name'])

<select
    name="{{ $name }}"
    data-control="select2"
    {!! $attributes->merge(['class' => 'form-select form-select-solid']) !!}>
    {{ $slot }}
</select>
