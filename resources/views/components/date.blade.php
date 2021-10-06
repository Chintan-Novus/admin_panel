@props([
    'type' => 'date',
    'name',
    'value',
    'placeholder',
    'id',
    'enableTime' => false
])

<div class="position-relative d-flex align-items-center">
    {!! ThemeHelper::getSVG('assets/media/icons/duotune/general/gen014.svg', 'svg-icon-2 position-absolute mx-4') !!}
    <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            placeholder="{{ $placeholder ?? '' }}"
            value="{{ $value ?? null }}"
            {!! $attributes->merge(['class' => 'form-control form-control-solid ps-12']) !!}
    />
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $(`#{{ $id }}`).flatpickr({
                enableTime: @json($enableTime),
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endpush
