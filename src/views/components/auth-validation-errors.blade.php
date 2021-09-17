@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} {{ $attributes->merge(['class' => 'notice d-flex bg-light-danger rounded border-danger border border-solid p-6']) }}>
        <div class="d-flex flex-stack flex-grow-1">
            <div class="fw-bold">
                <div class="fs-6 text-danger">
                    <span class="fw-bolder">{{ __('Whoops! Something went wrong.') }}</span>
                </div>
                <div class="d-flex flex-column">
                    @foreach ($errors->all() as $error)
                        <li class="d-flex text-danger align-items-center py-2">
                            <span class="bullet bullet-dot bg-danger me-5"></span> {{ $error }}
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
