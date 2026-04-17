<x-desktop.layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div id="content">
                    <div id="casino-lobby-content">
                        <div class="row casino-lobby-main-area">
                            <x-desktop.partials.casino.sidebar />
                            <div class="col-10 casino-lobby-game-box-area">
                                <div class="casino-lobby-game-box-area-wrapper">
                                    <div class="row">
                                        @php $id = 0; @endphp
                                        @for ($i = 1; $i <= 4; $i++)
                                            <div class="casino-lobby-game-box-column col-3">
                                                @php if ($i == 1) { $games = $loop_1; } elseif ($i == 2) { $games = $loop_2; } elseif ($i == 3) { $games = $loop_3; } else { $games = $loop_4; } @endphp
                                                @foreach ($games as $game)
                                                    <div class="casino-lobby-game-box" id="game-box-{{ $id }}">
                                                        <div class="casino-lobby-game-box-image" id="game-image-{{ $id }}">
                                                            <div class="casino-lobby-game-box-image-wrapper">
                                                                <img class="responsive-image lazyload" src="https://classbet97x.space/idn/assets/img/game-casino-holder.webp" data-original="{{ Str::isUrl($game->banner) ? $game->banner : config('app.cdn') . '/nexus/images/games/' . $game->banner }}" alt="{{ Str::title($game->name) }}">
                                                            </div>
                                                            <div class="casino-lobby-game-box-title-wrapper">
                                                                {{ Str::title($game->name) }}
                                                            </div>
                                                        </div>
                                                        <div class="casino-lobby-game-box-table"
                                                            id="game-table-{{ $id }}"
                                                            data-gid="{{ $id }}">
                                                            <div class="casino-lobby-game-box-table-inner">
                                                                <div class="casino-lobby-game-box-table-wrapper">
                                                                    <table class="bet-limit-table  ">
                                                                        <thead class="table-head">
                                                                            <tr class="no-padding">
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
                                                                <div class="casino-lobby-game-box-button-wrapper">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a href="/register">
                                                                                <div class="btn-game-green">
                                                                                    Daftar
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <a class="login-modal" href="#"
                                                                                data-toggle="modal" data-target="#login"
                                                                                data-backdrop="static"
                                                                                data-keyboard="false">
                                                                                <div class="btn-game-blue">
                                                                                    Masuk
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="btn-game-gray back-face"
                                                                                data-gid="{{ $id }}">
                                                                                <i
                                                                                    class="fa fa-arrow-circle-left"></i>Kembali
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="casino-lobby-game-box-title-wrapper">
                                                                    og plus
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-lobby-game-box-icons"
                                                            id="game-icons-{{ $id }}">
                                                            <div class="casino-lobby-game-box-icons-inner">
                                                                <div class="casino-lobby-game-box-icons-wrapper">
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_roulette.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_baccarat.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_sicbo.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_dragontiger.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_fantan.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_special.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                    <div class="casino-lobby-icons-wrapper">
                                                                        <img class="responsive-image" src="https://classbet97x.space/idn/assets/img/icon/icon_wheel.svg">
                                                                    </div>
                                                                    <div class="casino-lobby-icons-seperator"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="casino-lobby-game-box-flags" id="game-flags-{{ $id }}">
                                                            <div class="flag-wrapper">
                                                            </div>
                                                        </div>
                                                        <div class="casino-lobby-game-box-info-icon"
                                                            id="game-info-icon-{{ $id }}">
                                                            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false">
                                                                <div class="casino-lobby-game-box-info-icon-buffer">
                                                                </div>
                                                            </a>
                                                            <i class="fa fa-2x fa-info-circle info-icon front-face"
                                                                data-gid="{{ $id }}"></i>
                                                        </div>
                                                    </div>
                                                    @php $id++; @endphp
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
