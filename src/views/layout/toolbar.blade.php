@if (!empty($toolbarTitle) || !empty($toolbarButtons))
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

            {{-- Toolbar title --}}
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                    {{ ucwords($toolbarTitle) }}
                    @if (isset($toolbarDesscription))
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">{{ $toolbarDesscription }}</small>
                    @endif
                </h1>
            </div>

            {{-- Toolbar buttons --}}
            @if (!empty($toolbarButtons))
                <div class="d-flex align-items-center py-1">
                    @foreach($toolbarButtons as $toolbarButton)
                        <a href="{{ $toolbarButton['link'] }}"
                           class="btn btn-sm {{ $toolbarButton['class'] }} me-2">{{ $toolbarButton['title'] }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
