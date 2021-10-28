<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Page Title --}}
    <title>{!! BladeHelper::pageTitle($pageTitle ?? null) !!}</title>

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
    @stack('styles')

    @if (config('admin_panel.dark_mode') || Session::get('dark_mode'))
        @foreach(config('admin_panel.resources.css.dark') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @else
        @foreach(config('admin_panel.resources.css.regular') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif

</head>
@php
    $toolbarEnabled = !empty($toolbarTitle) || !empty($toolbarButtons);
@endphp

<body id="kt_body" data-kt-aside-minimize="{{ config('admin_panel.menu.aside_minimize') }}" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed {{ ($toolbarEnabled) ? "toolbar-enabled toolbar-fixed" : "" }}" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

{{-- Loader --}}
@include('admin_panel::layout.loader')

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">

        {{-- Sidebar --}}
        @include('admin_panel::layout.aside')

        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

            {{-- Header --}}
            @include('admin_panel::layout.header')

            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                {{-- Toolbar --}}
                @include('admin_panel::layout.toolbar')

                <div class="post d-flex flex-column-fluid" id="kt_post">

                    {{-- Page Content --}}
                    <div id="kt_content_container" class="container-xxl">
                        {{ $slot }}
                    </div>

                </div>
            </div>

            {{-- Footer --}}
            @include('admin_panel::layout.footer')

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
