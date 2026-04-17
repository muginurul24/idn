@props([
    'event' => false,
    'new' => false,
    'logo' => false,
    'dataid' => false,
    'active' => false,
])

<li>
    @if ($event == 'true')
        <div class="css-shapes">
            <span>Promo</span>
        </div>
    @endif
    @if ($new == 'true')
        <div class="css-shapes">
            <span>New</span>
        </div>
    @endif
    <a {{ $attributes }} class="{{ $active ? 'btn-provider active' : 'btn-provider' }}" id="sortCategory" data-id="{{ $dataid }}"
        data-logo="{{ $logo }}" disabled="">
        <i class="{{ $logo == 'popular' || $logo == 'new' ? 'icon-' : 'svg-' }}{{ $logo }}"></i>{{ $slot }}
    </a>
</li>
