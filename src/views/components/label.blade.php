@props(['value'])

<label {{ $attributes->merge(['class' => 'col-lg-2 col-form-label fw-bold fs-6']) }}>
    {{ ucfirst($value) ?? $slot }}
</label>
