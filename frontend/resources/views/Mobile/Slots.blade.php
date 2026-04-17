<x-mobile.layout>
    <div class="overlayPage" style="display:none"></div>
    <div class="mb-lg" style="min-height: 700px;">
        <div>
            <div class="arrow-left" onclick="scrollTest('left','#new-provider-row');">
            </div>
            <x-mobile.slots.navbar-providers />
            <div class="arrow-right" onclick="scrollTest('right','#new-provider-row');"></div>
        </div>
        <div class="horizontal-list-wrapper slots-wrapper" id="slot-games-wrapper">
            <div class="search-input">
                <div id="searchIcon"><i class="fa fa-search" aria-hidden="true" style="color: white;"></i></div>
                <div id="separator"></div>
                <input id="gameSearch" placeholder="Cari game" onkeyup="gameSearch(this)" />
            </div>
            @foreach ($games as $game)
                <div class="game-one-half-slot slots-games">
                    <div class="game-box-slots">
                        <a class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}"
                            href="{{ auth()->check() ? '/open-game/slot/' . $game->code : '#' }}"
                            @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                            <div class="game-box-slots">
                                @if ($game->provider->is_new)
                                    <div class="ribbon-baru-new">
                                        <img src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                            class="lazyload"
                                            data-original="https://classbet97x.space/idn/assets/img/ribbon-new.svg"
                                            alt="Ribbon Baru" />
                                    </div>
                                @endif
                                @if ($game->provider->is_promo)
                                    <div class="ribbon-baru">
                                        <img src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                            class="lazyload"
                                            data-original="https://classbet97x.space/idn/assets/img/ribbon-promo.svg"
                                            alt="Ribbon Baru" />
                                    </div>
                                @endif
                                <div
                                    class="badge-game {{ $game->provider->logo == 'pg' ? 'pgsoft' : $game->provider->logo }}">
                                    <i></i>
                                </div>
                                @if ($game->provider->is_new && $game->provider->is_promo)
                                    <div class="exclusive-promo-purple">
                                        EKSKLUSIF
                                    </div>
                                @endif
                                <div class="game-box-glow-in-purple"></div>
                                <img class="responsive-image lazyload slot-image"
                                    src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                    data-original="{{ Str::isUrl($game->banner) ? $game->banner : config('app.cdn') . '/nexus/images/games/' . $game->banner }}"
                                    alt="{{ $game->name }}">
                                <div class="game-title-slots">{{ $game->name }}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="clear"></div>
            <div id="loadmore" class="btn btn-primary btn-block btn-lg mtb-10">Load More</div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery.scrollto@2.1.3/jquery.scrollTo.min.js"></script>
    @endpush
</x-mobile.layout>
