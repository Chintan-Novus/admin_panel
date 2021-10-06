@props(['autosize' => 'true', 'name', 'value', 'placeholder', 'rows' => 3])

<textarea
    name="{{ $name }}"
    placeholder="{{ ucfirst($placeholder) ?? '' }}"
    rows="{{ $rows }}"
    {!! $attributes->merge(['class' => 'form-control form-control-solid']) !!}
    data-kt-autosize="{{ $autosize }}">{{ $value ?? null }}</textarea>
