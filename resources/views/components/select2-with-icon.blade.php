@props(['name', 'id'])

<select
    name="{{ $name }}"
    id="{{ $id }}"
    data-control="select2"
    {!! $attributes->merge(['class' => 'form-select form-select-solid']) !!}>
    {{ $slot }}
</select>

@push('scripts')
    <script>
        $(document).ready(function () {
            // Format options
            const format = (item) => {
                if (!item.id) {
                    return item.text;
                }

                const url = item.element.getAttribute('data-kt-select2-icon');
                const img = $("<img>", {
                    class: "rounded-circle me-2",
                    width: 26,
                    src: url
                });
                const span = $("<span>", {
                    text: " " + item.text
                });
                span.prepend(img);
                return span;
            }

            $(`#{{ $id }}`).select2({
                templateResult: function (item) {
                    return format(item);
                }
            });
        })
    </script>
@endpush
