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
<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Header Section-->
    <div class="mb-0" id="home">
        <!--begin::Wrapper-->
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
            <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center flex-equal">
                            <a href="{{ route('welcome') }}">
                                <img alt="Logo" src="{{ asset(config('admin_panel.resources.logo.dark')) }}" class="logo-default h-25px h-lg-30px" />
                                <img alt="Logo" src="{{ asset(config('admin_panel.resources.logo.light')) }}" class="logo-sticky h-20px h-lg-25px" />
                            </a>
                        </div>
                        <div class="flex-equal text-end ms-1">
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-success">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success">Sign In</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                <!--begin::Heading-->
                <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                    <!--begin::Title-->
                    <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">Welcome to
                        <span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">{{ config('app.name') }}</span>
                        </span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
@foreach(config('admin_panel.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
</body>
</html>
