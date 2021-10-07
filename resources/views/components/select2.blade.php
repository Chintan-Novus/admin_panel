@props(['name', 'disabled' => false])

<select
    name="{{ $name }}"
    data-control="select2"
    {!! $attributes->merge(['class' => 'form-select form-select-solid']) !!}
    @if($disabled)
        disabled
    @endif
>
    {{ $slot }}
</select>
