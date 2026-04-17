<x-desktop.layout>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div id="content">
                    <div class="slots-bg-container-popular">
                        <img src="">
                    </div>
                    <div class="game-title-wrapper">
                        <div class="category-title">
                            <h1>{{ config('app.name') . ' | ' . config('app.title') }}</h1>
                        </div>
                    </div>
                    <section id="slots">
                        <x-desktop.partials.slots.sidebar />
                        <div class="col-sm-9">
                            <div class="horizontal-list-wrapper">
                                @foreach ($games as $game)
                                <div class="game-one-half-slot slots-games">
                                    <div class="game-box-slots">
                                        <a class="{{ auth()->check() ? 'lobby-time-limit' : 'login-modal' }}" href="{{ auth()->check() ? '/open-game/slot/' . $game->code : '#' }}" @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                                            @if ($game->category == 'hot')
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon">promo</div>
                                            </div>
                                            @endif
                                            <div class="slot-hover-buttons">
                                                <div class="slot-play-button">Play Now</div>
                                            </div>
                                            <div class="slots-img-wrap">
                                                <div class="badge-game {{ $game->provider->logo == 'pg' ? 'pgsoft' : $game->provider->logo }}">
                                                    <i></i>
                                                </div>
                                                <img class="responsive-image lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                                    data-original="{{ Str::isUrl($game->banner) ? $game->banner : config('app.cdn') . '/nexus/images/games/' . $game->banner }}"
                                                    alt="Slot Game {{ Str::title($game->name) }}">
                                            </div>
                                            <div class="clear"></div>
                                            @if ($game->category == 'hot' || $game->category == 'new')
                                            <div class="exclusive-promo-purple">
                                                EKSKLUSIF
                                            </div>
                                            @endif
                                            @if ($game->category == 'new')
                                            <div class="ribbon-baru">
                                                <img class="lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                                    data-original="https://classbet97x.space/idn/assets/img/slot-icon/new.webp"
                                                    alt="new-ribbon" />
                                            </div>
                                            @endif
                                            <div class="game-title-slots" style="font-size: 10px;"><b>{{ Str::title($game->name) }}</b>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
