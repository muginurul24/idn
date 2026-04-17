<x-mobile.layout>
    <div class="mb-lg" style="background: white">
        <div class="game-box" style="width: 100%; height: 270px; position: relative;">
            <a class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}"
                href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}"
                @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                <div class="game-box-slots" style="position: relative;">
                    <img class="lazyload" style="width: 100%; height: 200%;" href="/slots/new"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://classbet97x.space/idn/assets/img/newlobby.webp" alt="NEWLOBBY">
                    <div class="game-title-slots">New Lobby IDNLive</div>
                </div>
            </a>
        </div>
        @foreach ($casinos as $casino)
            <div class="game-box">
                <a class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}"
                    href="{{ auth()->check() ? '/open-game/casino/' . $casino->code : '#' }}"
                    @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                    <div class="game-box-slots" style="position: relative;">
                        <img class="lazyload" style="width: 100%; height: 97px;"
                            src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                            data-original="{{ Str::isUrl($casino->banner) ? $casino->banner : config('app.cdn') . '/nexus/images/games/' . $casino->banner }}"
                            alt="{{ $casino->name }}">
                        <div class="game-title-slots">{{ $casino->name }}</div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="clear"></div>
    </div>
</x-mobile.layout>
