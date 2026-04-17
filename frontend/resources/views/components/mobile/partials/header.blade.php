<div class="header">
    <a class="hamburger is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </a>
    @guest
        <a class="navbar-brand" href="{{ config('app.url') }}">
            <img src="/storage/{{ config('app.mobile_logo') }}"
                title="{{ config('app.name') . ' | ' . config('app.title') }}"
                alt="{{ config('app.name') . ' | ' . config('app.title') }}">
        </a>
        <a href="/register" class="login-btn btn btn-success btn-register-lg text-uppercase">Daftar</a>
        <a href="/register" class="login-btn btn btn-success btn-register-sm text-uppercase"><i class="fa fa-edit"></i></a>
        <button type="button" class="login-btn btn btn-primary btn-login-lg text-uppercase" data-toggle="modal"
            data-target="#login">Masuk</button>
        <button type="button" class="login-btn btn btn-primary btn-login-sm text-uppercase" data-toggle="modal"
            data-target="#login"><i class="fa fa-sign-in-alt"></i></button>
    @else
        <a class="navbar-brand navbar-brand-login" href="{{ config('app.url') }}">
            <img src="/storage/{{ config('app.mobile_logo') }}"
                title="{{ config('app.name') . ' | ' . config('app.title') }}"
                alt="{{ config('app.name') . ' | ' . config('app.title') }}">
        </a>
        <div class="user-info pull-right">
            <div class="user-welcome">
                <span>Hi, {{ auth()->user()->username }}</span>
            </div>
            <div class="user-balance">
                <div class="dropdown">
                    <span>IDR</span>
                    <a href="#" data-toggle = "dropdown" class="dropdown-toggle" id="total-wallet-holder">
                        {{ number_format(auth()->user()->balance, 2, ',', '.') }}
                    </a>
                    <ul class="dropdown-menu" style="left: -75%;color: black; font-size: 10px; padding: 10px">
                        <li>
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Dompet</th>
                                        <th class="text-right">Jumlah</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <hr style="margin: 3px">
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Dompet Utama</td>
                                        <td class="text-right"><span class="main-wallet"
                                                id="main-balance-holder">{{ number_format(auth()->user()->balance, 2, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Live Casino &amp; Slots
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-live-casino-slots">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Poker
                                        </td>
                                        <td class="text-right">
                                            <span id="game-balance-idnplay">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sports
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-ubo">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            CMD
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-cmd">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            IDNSeamless
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-idnlive">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            CQ9
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-cq9">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            TFGaming
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-tfgaming">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Song88
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-song88">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Golden Race
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-goldenrace">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Ultraplay
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-ultraplay">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            PG
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-pgsoft">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Vivo Gaming
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-vivogaming">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ION Gaming
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-iongaming">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Opus Gaming
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-opusgaming">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            MM Bolatangkas
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-mickeymouse">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            GMW
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-habanero-gmw">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            SABA Sports
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-saba">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            UPG
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-upg">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Habanero Direct 2
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-habanero2">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Microgaming Direct 2
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-microgaming2">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pragmatic Direct
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-pragmatic">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            menu.net22-idnnet22
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-net22-idnnet22">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            menu.direct-pragmatic-rtp
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-pragmatic-rtp">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            menu.live-casino-slots2
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-live-casino-slots2">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Microgaming Direct Arcade
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-microgaming-arcade">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pragmatic Direct Arcade
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-pragmatic-arcade">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            menu.simpleplay2
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-simpleplay2">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            menu.direct-fatpanda2
                                        </td>
                                        <td class="text-right">
                                            <span class="game-wallet" id="game-balance-direct-fatpanda2">
                                                0,00
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">
                                            <hr style="margin: 3px">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td style="text-align: right;"><span
                                                class="totalWallet">{{ number_format(auth()->user()->balance, 2, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </li>
                        <li>
                            <div class="container">
                                <div class="row" style="text-align: center; font-size: 18px">
                                    <div class="col-6">
                                        <a href="#" id="refresh-balance" style="text-decoration: none;">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" id="calibrate-balance" style="text-decoration: none;">
                                            <i class="fa fa-arrow-circle-up"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endguest
</div>
<div class="header-clear"></div>
<div class="overlay"></div>
