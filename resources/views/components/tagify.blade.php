@props([
    'name',
    'tags' => ["Ada", "Adenine", "Agda", "Agilent VEE"],
    'value',
    'placeholder',
    'id',
    'inline' => true,
    'enabled' => false,
    'closeOnSelect' => false,
    'maxItems' => 100,
    'maxTags' => 100,
])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<input
        type="text"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ $value ?? null }}" {!! $attributes->merge(['class' => 'form-control form-control-solid']) !!}
/>

@push('scripts')
    <script>
        var input = document.querySelector("#{{ $id }}");
        new Tagify(input, {
            whitelist: @json($tags),
            maxTags: @json($maxTags),
            value: '',
            dropdown: {
                maxItems: @json($maxItems),
                classname: "{{ ($inline) ? "tagify__inline__suggestions" : "" }}",
                enabled: @json($enabled),
                closeOnSelect: @json($closeOnSelect)
            }
        });
    </script>
@endpush
