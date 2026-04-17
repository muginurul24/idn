<x-mobile.layout>
    <div class="overlayPage" style="display:none"></div>
    <div class="mb-lg">
        <div class="owl-carousel category-game-menu text-center" id="category-row">
            <div class="item">
                <a href="/casino" class="btn-category category-link owl-active-item" data-position="0" data-id="lobby">
                    <i class="svg-lobby svg-category"></i>Lobby
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="1" data-id="roulette"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_roulette.svg');"></i>Roulette
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="2" data-id="baccarat"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_baccarat.svg');"></i>Baccarat
                </a>
                <div class="promo-ribbon-category" style="right: 25%;">
                    <span>promo</span>
                </div>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="3" data-id="sicbo"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_sicbo.svg');"></i>Sicbo
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="4" data-id="wheel"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://landingsplash.xyz/banner//image/idnsport/casino-category/Wheel%2038x30.svg');"></i>Wheel
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="5" data-id="dragon-tiger"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_dragontiger.svg');"></i>Dragon
                    Tiger
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="6" data-id="fantan"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_fantan.svg');"></i>Fantan
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="7" data-id="blackjack"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_blackjack.svg');"></i>Blackjack
                </a>
            </div>
            <div class="item">
                <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" data-position="8" data-id="special-games"
                    @guest class="login-modal category-link btn-category" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else class="category-link btn-category" target="_blank" @endguest>
                    <i class="svg-category"
                        style="background-image: url('https://classbet97x.space/idn/assets/img/icon/icon_special.svg');"></i>Special
                    Games
                </a>
            </div>
        </div>

        <div class="game-box-area" style="z-index: 1;">
            <div class="row">
                @php $id = 0; @endphp
                @for ($i = 1; $i <= 4; $i++)
                <div class="game-box-column col-4">
                    @php if ($i == 1) { $games = $loop_1; } elseif ($i == 2) { $games = $loop_2; } elseif ($i == 3) { $games = $loop_3; } else { $games = $loop_4; } @endphp
                    @foreach ($games as $game)
                    <div class="game-box" id="game-box-{{ $id }}">
                        <div class="game-box-image">
                            <div class="game-box-image-wrapper" id="game-image-{{ $id }}">
                                <img class="responsive-image lazyload"
                                    src="https://classbet97x.space/idn/assets/mobile/img/casino-lobby/game-casino-holder.webp"
                                    data-original="{{ Str::isUrl($game->banner) ? $game->banner : config('app.cdn') . '/nexus/images/games/' . $game->banner }}"
                                    alt="{{ Str::title($game->name) }}">
                            </div>
                            <div class="game-box-title-wrapper">
                                {{ Str::limit(Str::title($game->name), 10, '...') }}
                            </div>
                        </div>
                        <div class="game-box-table back-face" id="game-table-{{ $id }}" data-gid="{{ $id }}">
                            <div class="game-box-table-inner">
                                <div class="game-box-table-wrapper">
                                    <table width="100%" class="bet-limit-table">
                                        <thead class="table-head">
                                            <tr>
                                                <td class="center">Meja</td>
                                                <td class="center">Min</td>
                                                <td class="center">Max</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Baccarat</td>
                                                <td class="center">1Rb</td>
                                                <td class="center">10Jt</td>
                                            </tr>
                                            <tr>
                                                <td>Dragon Tiger</td>
                                                <td class="center">1Rb</td>
                                                <td class="center">10Jt</td>
                                            </tr>
                                            <tr>
                                                <td>Roulette</td>
                                                <td class="center">1Rb</td>
                                                <td class="center">10Jt</td>
                                            </tr>
                                            <tr>
                                                <td>Wheel</td>
                                                <td class="center">1Rb</td>
                                                <td class="center">10Jt</td>
                                            </tr>
                                            <tr>
                                                <td>Special Games</td>
                                                <td class="center">1Rb</td>
                                                <td class="center">10Jt</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="game-box-button-wrapper">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ auth()->check() ? '/deposit' : '/register' }}">
                                                <div class="btn-game-green">
                                                    {{ auth()->check() ? 'Deposit' : 'Daftar' }}
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ auth()->check() ? '/open-game/casino/' . $game->code : '#' }}" class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}" @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                                                <div class="btn-game-blue">
                                                    {{ auth()->check() ? 'Main' : 'Masuk' }}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btn-game-gray back-face" data-gid="{{ $id }}">
                                                <i class="fa fa-arrow-circle-left"></i>Kembali
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="game-box-title-wrapper">
                                    {{ Str::limit(Str::title($game->name), 10, '...') }}
                                </div>
                            </div>
                        </div>
                        <div class="game-box-icons" id="game-icons-{{ $id }}">
                            <div class="game-box-icons-inner">
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_roulette.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_baccarat.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_sicbo.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_dragontiger.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_fantan.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_special.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                                <div class="game-box-icons-wrapper">
                                    <img class="responsive-image"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_wheel.svg">
                                </div>
                                <div class="btn-game-seperator"></div>
                            </div>
                        </div>
                        <div class="game-box-flags" id="game-flags-{{ $id }}">
                            <div class="flag-wrapper">
                            </div>
                        </div>
                        <div class="game-box-info-icon" id="game-info-icon-{{ $id }}">
                            <a href="{{ auth()->check() ? '/open-game/casino/' . $game->code : '#' }}" class="{{ auth()->check() ? 'btn-real lobby-time-limit' : 'login-modal' }}" @guest data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false" @else target="_blank" @endguest>
                                <div class="game-box-info-icon-buffer">
                                </div>
                            </a>
                            <i class="fa fa-3x fa-circle"
                                style="color: black; position: absolute; z-index: 5; bottom: 10%; right:5%;"></i>
                            <i class="fa fa-3x fa-info-circle info-icon front-face" data-gid="{{ $id }}"></i>
                        </div>
                    </div>
                    @php $id++; @endphp
                    @endforeach
                </div>
                @endfor
            </div>
        </div>
    </div>
</x-mobile.layout>
