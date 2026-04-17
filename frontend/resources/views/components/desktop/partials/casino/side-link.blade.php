@props([
    'event' => false,
    'logo' => false,
    'active' => false,
])

<div class="casino-lobby-nav-item-wrapper">
    @if ($event == 'true')
    <div class="promo-ribbon-category">
        <span>promo</span>
    </div>
    @endif
    <a {{ $attributes }}>
        <div class="{{ $active ? 'casino-lobby-nav-item active' : 'casino-lobby-nav-item' }}">
            <div class="row">
                <div class="col-3 casino-lobby-nav-icon-wrapper no-padding">
                    <i class="{{ $active ? 'svg-lobby svg-category active' : 'svg-lobby svg-category' }}" @if ($logo != 'lobby') style="background-image: url(https://classbet97x.space/idn/assets/img/icon/icon_{{ $logo }}.svg);" @endif></i>
                </div>
                <div class="col-9 casino-lobby-nav-text-wrapper no-padding">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </a>
</div>
