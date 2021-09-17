@props([
    'title',
    'footer',
])

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">{{ ucwords($title) }}</h3>

        @if (isset($toolbar))
            <div class="card-toolbar">
                {{ $toolbar }}
            </div>
        @endif
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div {{ $footer->attributes->class(['card-footer']) }}>
            {{ $footer }}
        </div>
    @endif
</div>
