<x-mobile.layout>
    <div class="overlayPage" style="display:none"></div>
    <div class="mb-lg">
        <div>
            <div class="arrow-left" onclick="scrollTest('left','#new-provider-row');">
            </div>
            <x-mobile.arcade.provider-nav />
            <div class="arrow-right" onclick="scrollTest('right','#new-provider-row');"></div>

        </div>
        <div class="horizontal-list-wrapper slots-wrapper" id="slot-games-wrapper">
            <div class="search-input">
                <div id="searchIcon"><i class="fa fa-search" aria-hidden="true" style="color: white;"></i></div>
                <div id="separator"></div>
                <input id="gameSearch" placeholder="Cari game" onkeyup="gameSearch(this)" />
            </div>
            @foreach ($games as $game)
                <div class="game-one-half-slot slots-games" data-hide="{{ $game->name }}">
                    <div class="game-box-slots">
                        <a class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}"
                            href="{{ auth()->check() ? '/open-game/slot/' . $game->code : '#' }}"
                            @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                            <div class="slot-hover-buttons" data-hide="{{ $game->name }}" hidden>
                                <div class="slot-play-button">Play</div>
                            </div>
                        </a>
                        <a class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}"
                            href="{{ auth()->check() ? '/open-game/slot/' . $game->code : '#' }}"
                            @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                        </a>
                    </div>
                    <div class="game-box-slots">
                        @if ($game->provider->is_new)
                            <div class="ribbon-baru-new">
                                <img src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp" class="lazyload"
                                    data-original="https://classbet97x.space/idn/assets/img/ribbon-new.svg"
                                    alt="Ribbon Baru" />
                            </div>
                        @endif
                        @if ($game->provider->is_promo)
                            <div class="ribbon-baru">
                                <img src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp" class="lazyload"
                                    data-original="https://classbet97x.space/idn/assets/img/ribbon-promo.svg"
                                    alt="Ribbon Baru" />
                            </div>
                        @endif
                        <div class="badge-game {{ $game->provider->logo == 'pg' ? 'pgsoft' : $game->provider->logo }}">
                            <i></i>
                        </div>
                        <img class="responsive-image lazyload slot-image"
                            src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                            data-original="{{ Str::isUrl($game->banner) ? $game->banner : config('app.cdn') . '/nexus/images/games/' . $game->banner }}"
                            alt="{{ $game->name }}">
                        <div class="game-title-slots">{{ $game->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="clear"></div>
    <div id="loadmore" class="btn btn-primary btn-block btn-lg mtb-10">Load More</div>
    @push('stacks')
        <script src="https://cdn.jsdelivr.net/npm/jquery.scrollto@2.1.3/jquery.scrollTo.min.js"></script>
    @endpush
</x-mobile.layout>
