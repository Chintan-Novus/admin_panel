@if (!empty($toolbarTitle) || !empty($toolbarButtons) || !empty($toolbarDeleteAction))
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

            {{-- Toolbar title --}}
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                    {{ ucwords($toolbarTitle) }}
                    @if (isset($toolbarDescription))
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">{{ $toolbarDescription }}</small>
                    @endif
                </h1>
            </div>

            {{-- Toolbar buttons --}}
            @if (!empty($toolbarButtons) || !empty($toolbarDeleteAction))
                <div class="d-flex align-items-center py-1">
                    @if (!empty($toolbarDeleteAction))
                        <div class="d-flex justify-content-end align-items-center d-none" datatable-toolbar="selected">
                            <button type="button" class="btn btn-sm btn-light-danger me-3" datatable-select="delete_selected">
                                Delete Selected (<span datatable-select="selected_count"></span>)
                            </button>
                            <form method="POST" action="{{ $toolbarDeleteAction }}" id="multi_delete_form">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="selected_id" id="selected_id">
                            </form>
                        </div>
                    @endif

                    @if (!empty($toolbarButtons))
                        @foreach($toolbarButtons as $toolbarButton)
                            <a href="{{ $toolbarButton['link'] }}"
                               class="btn btn-sm {{ $toolbarButton['class'] }} me-2">{{ $toolbarButton['title'] }}</a>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
@endif
