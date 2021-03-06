<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Page Title --}}
    <title>{{ config('app.name') }}</title>

    {{-- Meta data --}}
    @if (isset($pageMeta))
        @foreach($pageMeta as $meta)
            <meta name="{{ $meta['name'] }}" content="{{ $meta['content'] }}"/>
        @endforeach
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset(config('admin_panel.resources.favicon')) }}"/>

    {{-- Fonts --}}
    @if (config('admin_panel.resources.fonts.google.families'))
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family={{ implode('|', config('admin_panel.resources.fonts.google.families')) }}">
    @endif

    {{-- Styles --}}
    @if (config('admin_panel.dark_mode'))
        @foreach(config('admin_panel.resources.css.dark') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @else
        @foreach(config('admin_panel.resources.css.regular') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

    @stack('styles')

</head>
<body id="kt_body" class="{{ config('admin_panel.resources.auth.background_color') }}">

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset(config('admin_panel.resources.auth.background_image')) }})">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

            <a href="{{ route('welcome') }}" class="mb-12">
                <img alt="Logo" src="{{ asset(config('admin_panel.resources.auth.logo')) }}" class="h-40px" />
            </a>

            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

{{-- Scroll to top --}}
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    {!! ThemeHelper::getSVG('assets/media/icons/duotune/arrows/arr066.svg') !!}
</div>

{{-- Scripts --}}
@foreach(config('admin_panel.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
<script>
    $(document).ready(function () {
        @if(session('status'))
            toastr['success']("{{ session('status') }}");
        @elseif(session('success'))
            toastr['success']("{{ session('success') }}");
        @elseif(session('error'))
            toastr['error']("{{ session('error') }}");
        @endif
    })
</script>
@stack('scripts')

</body>
</html>
