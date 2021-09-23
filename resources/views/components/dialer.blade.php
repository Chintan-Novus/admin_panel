@props([
    'name',
    'id',
    'value',
    'min'=> 0,
    'max'=> 10000000,
    'step'=> 100,
    'prefix',
    'decimals'=> 2
])

@php
    if(empty($id)) {
        $id = $name;
    }
@endphp

<div class="position-relative w-md-300px"
     data-kt-dialer="true"
     @if (isset($min))
     data-kt-dialer-min="{{ $min }}"
     @endif
     @if (isset($max))
     data-kt-dialer-max="{{ $max }}"
     @endif
     data-kt-dialer-step="{{ $step }}"
     @if (isset($prefix))
     data-kt-dialer-prefix="{{ $prefix }}"
     @endif
     data-kt-dialer-decimals="{{ $decimals }}">

    <button type="button"
            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
            data-kt-dialer-control="decrease">
        {!! ThemeHelper::getSVG('assets/media/icons/duotune/general/gen036.svg', 'svg-icon-1') !!}
    </button>

    <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" name="{{ $name }}" value="{{ $value ?? 0 }}"/>

    <button type="button"
            class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
            data-kt-dialer-control="increase">
        {!! ThemeHelper::getSVG('assets/media/icons/duotune/general/gen035.svg', 'svg-icon-1') !!}
    </button>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            // Dialer container element
            var dialerElement = document.querySelector("#kt_dialer_example_1");

            // Create dialer object and initialize a new instance
            var dialerObject = new KTDialer(dialerElement, {
                min: {{ $min }},
                max: {{ $max }},
                step: {{ $step }},
                prefix: '$',
                decimals: {{ $decimals }}
            });
        });
    </script>
@endpush

