@props([
    'active' => false,
    'logo' => false,
    'event' => false,
    'new' => false,
    'dataid' => false,
    'position' => false,
])

<div class="{{ $active ? 'item active' : 'item' }}">
    <a {{ $attributes }} class="btn-provider" data-id="{{ $dataid }}" data-position="{{ $position }}">
        <i class="svg-{{ $logo }}"></i>
        <span style="font-size:9px">{{ $slot }}</span>
        @if ($event == 'true')
            <div class="promo-ribbon-wrapper" style="position: absolute; bottom:0; width:100%;">
                <div class="promo-ribbon">PROMOTION</div>
            </div>
        @endif
        @if ($new == 'true')
            <div class="new-ribbon-wrapper" style="position: absolute; bottom:0; width:100%;">
                <div class="new-ribbon"><span>NEW</span></div>
            </div>
        @endif
    </a>
</div>
