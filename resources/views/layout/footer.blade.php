<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">{{ date('Y') }}©</span>
            <a href="https://novuslogics.com" target="_blank" class="text-gray-800 text-hover-primary">{{ config('app.name') }}</a>
        </div>
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-bold me-1">Developed with <i class="bi bi-heart-fill text-danger animation-blink"></i> at Novus Logics</span>
        </div>
        {!! ThemeHelper::footerMenu() !!}
    </div>
</div>
