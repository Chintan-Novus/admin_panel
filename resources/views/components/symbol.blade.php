@props([
    'label',
    'avatar',
])

<div {!! $attributes->merge(['class' => 'symbol']) !!}>

    {{-- Label --}}
    @if (isset($label))
        <div {{ $label->attributes->class(['symbol-label']) }}>
            {!! BladeHelper::symbolName($label) !!}
        </div>
    @endif
    @if(isset($avatar))
        <div {{ $avatar->attributes->class(['symbol-label']) }}></div>
    @endif

</div>
