<x-desktop.layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div class="sports-arena">
                    <div class="row text-center">
                    </div>
                    <hr>
                    <h3 style="color:#FFF;" class="normal-heading"> </h3>
                    <div class="row text-center" style="color:#FFF;">
                        <div class="col-md-12 sport-box">
                            <div class="content-sport game-box-slots">
                                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}" @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" onclick="return false" @else target="_blank" @endguest>
                                    <img class="img-full lazyload" align="middle"
                                        src="https://classbet97x.space/idn/assets/img/game-sport-holder.webp"
                                        data-original="https://classbet97x.space/idn/assets/img/games/lobby/DesktopIDNRaffle.webp"
                                        alt="Main Sekarang">
                                </a>
                                <div class="play-box text-uppercase">
                                    <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                        data-backdrop="static" data-keyboard="false" onclick="return false"> BELI TIKET
                                        SEKARANG</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
