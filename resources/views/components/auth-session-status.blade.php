@props(['status'])

@if ($status)
    <div class="alert alert-success d-flex align-items-center p-5 mb-10">
        {!! ThemeHelper::getSVG('assets/media/icons/duotune/general/gen048.svg', 'svg-icon-2hx svg-icon-success me-4') !!}

        <div class="d-flex flex-column">
            <h4 class="mb-1 text-success">{{ $status }}</h4>
        </div>
    </div>
@endif
