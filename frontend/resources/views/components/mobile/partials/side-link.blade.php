@props([
    'active' => false,
    'new' => false,
    'event' => false,
    'logo' => false,
])

<li>
    <a {{ $attributes }} @if($active) class="active" @endif>
        <i class="{{ Str::substr($logo, 0, 3) != 'fa-' ? 'svg-' . $logo : 'fa ' . $logo }}" @if(Str::substr($logo, 0, 3) == 'fa-') style="font-size: 18px" @endif></i> {{ $slot }}
        @if ($new == 'true')
            <div class="new-ribbon-sidebar">
                <span>BARU</span>
            </div>
        @endif
        @if ($event == 'true')
            <div class="promo-ribbon-sidebar">
                <span>PROMO</span>
            </div>
        @endif
    </a>
</li>
