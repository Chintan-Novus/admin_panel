<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">{{ date('Y') }}©</span>
            <span class="text-gray-800">{{ config('app.name') }}</span>
        </div>
        @if(config('admin_panel.developer.show'))
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-bold me-1">Developed with <i class="bi bi-heart-fill text-danger animation-blink"></i> at <a href="{{ config('admin_panel.developer.website') }}" target="_blank" class="text-muted text-hover-info">{{ config('admin_panel.developer.name') }}</a></span>
            </div>
        @endif
        {!! ThemeHelper::footerMenu() !!}
    </div>
</div>
