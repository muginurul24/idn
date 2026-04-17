<x-mobile.layout>
    <div id="slider">
        <div class="container">
            <div class="row">
                <div class="slide-wrapper">
                    <x-mobile.partials.carousels />
                </div>
            </div>
        </div>
    </div>
    <a href="/sportsbook">
        <div class="mb-10 game-item">
            <div class="game-box">
                <img class="lazyload game-image responsive-image"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/sportsbook.webp" alt="Sports">
                <h5 class="game-title">Sports</h5>
            </div>
        </div>
    </a>
    <a href="/idnlive">
        <div class="mb-10 game-item">
            <div class="game-box">
                <div class="game-thumb">
                    <img class="lazyload game-image responsive-image"
                        src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                        data-original="https://classbet97x.space/idn/assets/mobile/img/live-number.webp"
                        alt="Live Number">
                </div>
                <h5 class="game-title">IDNLIVE</h5>
            </div>
        </div>
    </a>
    <a href="/slots">
        <div class="mb-10 game-item">
            <div class="game-box">
                <img class="lazyload game-image responsive-image"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/slots.webp?v=2" alt="Slots">
                <h5 class="game-title">Slots</h5>
            </div>
        </div>
    </a>
    <a href="/casino">
        <div class="mb-10 game-item">
            <div class="game-box">
                <img class="lazyload game-image responsive-image"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/casino.webp?v=2" alt="Live Casino">
                <h5 class="game-title">Live Casino</h5>
            </div>
        </div>
    </a>
    <a href="/lottery">
        <div class="mb-10 game-item">
            <div class="game-box">
                <div class="game-thumb">
                    <img class="game-image responsive-image"
                        src="https://classbet97x.space/idn/assets/mobile/img/lottery.webp?v=8.9" alt="Lottery">
                </div>
                <h5 class="game-title">Lottery</h5>
            </div>
        </div>
    </a>
    <a href="/idnpoker">
        <div class="mb-10 game-item">
            <div class="game-box">
                <img class="lazyload game-image responsive-image"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/poker.webp" alt="Multiplayer">
                <h5 class="game-title">IDNPoker</h5>
            </div>
        </div>
    </a>
    <a href="/arcadeGames">
        <div class="mb-10 game-item-full">
            <div class="game-box-arcade">
                <img class="lazyload game-image responsive-image" style="margin:2px;"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/Arcade_Mobile.webp" alt="Arcade">
                <h5 class="game-title">Arcade</h5>
            </div>
        </div>
    </a>
    <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" @guest data-toggle="modal" data-target="#login" @else target="_blank" @endguest>
        <div class="mb-10">
            <div class="game-box-raffle">
                <img class="lazyload game-image responsive-image" style="margin:2px;"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/MobileIDNRAFFLE.webp" alt="IDNRaffle">
            </div>
        </div>
    </a>
    <a href="/tableGames">
        <div class="mb-10 game-item">
            <div class="game-box">
                <img class="lazyload game-image responsive-image"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/live-number.webp" alt="Live Number">
                <h5 class="game-title">Table Games</h5>
            </div>
        </div>
    </a>
    <a href="/slots">
        <div class="mb-10 game-item">
            <div class="game-box">
                <img class="lazyload game-image responsive-image"
                    src="https://classbet97x.space/idn/assets/mobile/img/home-game-holder.webp"
                    data-original="https://classbet97x.space/idn/assets/mobile/img/fishing.webp" alt="Fishing">
                <h5 class="game-title">Fishing</h5>
            </div>
        </div>
    </a>
    <a href="/promotion">
        <div class="container mb-lg" style="padding : 0; margin-bottom : 2em;">
            <img class="lazyload game-image responsive-image"
                src="https://classbet97x.space/idn/assets/mobile/img/home-promo-holder.webp"
                data-original="https://classbet97x.space/idn/assets/mobile/img/promotion-home.webp" alt="Fishing">
        </div>
    </a>
    <!-- End of content -->
</x-mobile.layout>
