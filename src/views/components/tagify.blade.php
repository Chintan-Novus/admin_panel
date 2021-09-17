@props(['name', 'value', 'placeholder', 'id'])

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

        // new Tagify(input2);
        var input = document.querySelector("#{{ $id }}");
        {{--var data = $('#{{ $id }}').val();--}}
        {{--$('#{{ $id }}').val(data);--}}
        // Initialize Tagify script on the above inputs
        new Tagify(input, {
            whitelist: ["Ada", "Adenine", "Agda", "Agilent VEE"],
            maxTags: 10,
            value: '',
            dropdown: {
                maxItems: 20,           // <- mixumum allowed rendered suggestions
                classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
            }
        });


        var taken = [];

        function sample(c_id) {
            var inp = document.getElementById("{{ $id }}");
            var ind = taken.indexOf(c_id);
            if (ind > -1) {
                taken.splice(ind, 1);
                taken = taken;
            } else {
                taken.push(c_id);
            }
            inp.value = taken.join(',');
        }
    </script>
@endpush
