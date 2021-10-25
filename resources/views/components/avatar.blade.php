@props([
    'name',
    'value',
    'path',
    'placeholder',
    'id',
    'cancel' => false,
    'remove' => true,
])

@php
    $id = $id ?? $name;
    $backgroundImage = (!empty($path) && !empty($value) && $helper::fileExists('public/uploads/'.$path, $value)) ? $helper::glideImage($path. $value, 125, 125) : asset('assets/media/avatars/blank.png');
@endphp

<div class="image-input image-input-empty" data-kt-image-input="true"
     style="background-image: url('{{ $backgroundImage }}')">
    <div class="image-input-wrapper w-125px h-125px"></div>
    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
           data-kt-image-input-action="change"
           data-bs-toggle="tooltip"
           data-bs-dismiss="click"
           title="Change {{ $placeholder }}">
        <i class="bi bi-pencil-fill fs-7"></i>

        <input type="file" name="{{ $name }}" id="{{ $id }}" accept=".png, .jpg, .jpeg, .svg"/>
        <input type="hidden" name="{{ $name }}_remove"/>
    </label>
    @if ($cancel)
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="Cancel {{ $placeholder }}">
            <i class="bi bi-x fs-2"></i>
        </span>
    @endif
    @if ($remove)
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="Remove {{ $placeholder }}">
            <i class="bi bi-x fs-2"></i>
        </span>
    @endif
</div>
