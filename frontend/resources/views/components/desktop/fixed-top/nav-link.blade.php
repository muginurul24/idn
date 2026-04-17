@props([
    'active' => false,
    'new' => false,
    'event' => false,
    'page' => false,
])

<li id="li-{{ $page }}" data-page="{{ $page }}">
    @if ($new == 'true')
        <div class="new-ribbon-navbar" style="padding: 4px; left: 50%;">
            <span>BARU</span>
        </div>
    @endif
    @if ($event == 'true')
        <div class="promo-ribbon-navbar" style="left: 50%;">
            <span>promo</span>
        </div>
    @endif
    <a {{ $attributes }} id="{{ $page }}" class="{{ $active ? 'current text-uppercase' : 'text-uppercase' }}"
        style="font-size: 13px;" aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
</li>
