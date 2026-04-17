<div class="login-panel-ins float-right">
    <div class="user-rank">
        <div id="popover-bonus-content" style="display: none;">
            <table class="pop-wallet" cellspacing="0" cellpadding="0">
                <tbody class="text-center">
                    <tr>
                        <td>Total point Anda:</td>
                    </tr>
                    <tr class="user-points">
                        <td>{{ number_format($point->point, 2, ',', '.') }} / {{ number_format($valueMax, 2, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="javascript:void(0);" id="popover-bonus" rel="popover">
            <img class="user-rank-img"
                src="https://classbet97x.space/idn/assets/img/user-rank/rank-{{ $point->level }}.svg"
                alt="{{ Str::title($point->level) }} Rank" />
            <div id="progress-header" class="progress active">
                <div class="progress-bar progress-bar-success" role="progressbar"
                    data-transitiongoal="{{ $point->point }}.00" aria-valuemax="{{ $valueMax }}.00"
                    aria-valuemin="0">
                </div>
            </div>
        </a>
    </div>
    <div class="user-info" style="font-size:11px;">
        <div class="user-menu">
            <span class="opennewbig rb">
                <a href="javascript:void(0);" data-href="/transaction/history">
                    <i class="fas fa-exchange-alt"></i>Histori Transaksi</a>
            </span>
        </div>
        <div class="user-menu">
            <style type="text/css">
                .popover {
                    max-width: unset;
                }
            </style>
            <div id="popover-balance-content" style="display: none;">
                <table class="pop-wallet" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <th width="120px">Dompet</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="text-right">Jumlah</th>
                        </tr>
                        <tr>
                            <td>Dompet Utama</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span class="main-wallet"
                                    id="main-balance-holder">{{ number_format(auth()->user()->balance, 2, ',', '.') }}</span>
                            </td>
                        </tr>
                    </tbody>
                    <tr>
                        <td>Live Casino & Slots</td>
                        <td><span class="game-wallet" id="game-balance-live-casino-slots">0,00</td>
                        <td>IDNPoker</td>
                        <td><span class="game-wallet" id="game-balance-idnplay">0,00</td>
                        <td>UBO Sports</td>
                        <td><span class="game-wallet" id="game-balance-ubo">0,00</td>
                    </tr>
                    <tr>
                        <td>CMD Sports</td>
                        <td><span class="game-wallet" id="game-balance-cmd">0,00</td>
                        <td>IDN Live</td>
                        <td><span class="game-wallet" id="game-balance-idnlive">0,00</td>
                        <td>CQ9</td>
                        <td><span class="game-wallet" id="game-balance-cq9">0,00</td>
                    </tr>
                    <tr>
                        <td>TFGaming</td>
                        <td><span class="game-wallet" id="game-balance-tfgaming">0,00</td>
                        <td>Song 88</td>
                        <td><span class="game-wallet" id="game-balance-song88">0,00</td>
                        <td>Golden Race</td>
                        <td><span class="game-wallet" id="game-balance-goldenrace">0,00</td>
                    </tr>
                    <tr>
                        <td>UltraPlay</td>
                        <td><span class="game-wallet" id="game-balance-ultraplay">0,00</td>
                        <td>PG</td>
                        <td><span class="game-wallet" id="game-balance-pgsoft">0,00</td>
                        <td>Vivo Gaming</td>
                        <td><span class="game-wallet" id="game-balance-direct-vivogaming">0,00
                        </td>
                    </tr>
                    <tr>
                        <td>ION Gaming</td>
                        <td><span class="game-wallet" id="game-balance-direct-iongaming">0,00</td>
                        <td>Opus Gaming</td>
                        <td><span class="game-wallet" id="game-balance-direct-opusgaming">0,00
                        </td>
                        <td>MM BOLATANGKAS</td>
                        <td><span class="game-wallet" id="game-balance-mickeymouse">0,00</td>
                    </tr>
                    <tr>
                        <td>Habanero GMW</td>
                        <td><span class="game-wallet" id="game-balance-direct-habanero-gmw">0,00
                        </td>
                        <td>Saba Sports</td>
                        <td><span class="game-wallet" id="game-balance-saba">0,00</td>
                        <td>UPG</td>
                        <td><span class="game-wallet" id="game-balance-upg">0,00</td>
                    </tr>
                    <tr>
                        <td>Habanero Direct 2</td>
                        <td><span class="game-wallet" id="game-balance-direct-habanero2">0,00</td>
                        <td>Microgaming Direct 2</td>
                        <td><span class="game-wallet" id="game-balance-direct-microgaming2">0,00
                        </td>
                        <td>Pragmatic Direct</td>
                        <td><span class="game-wallet" id="game-balance-direct-pragmatic">0,00</td>
                    </tr>
                    <tr>
                        <td>IDN Net22</td>
                        <td><span class="game-wallet" id="game-balance-net22-idnnet22">0,00</td>
                        <td>Pragmatic Direct RTP</td>
                        <td><span class="game-wallet" id="game-balance-direct-pragmatic-rtp">0,00
                        </td>
                        <td>Playtech 2</td>
                        <td><span class="game-wallet" id="game-balance-playtech2">0,00</td>
                    </tr>
                    <tr>
                        <td>SG8 Arcade</td>
                        <td><span class="game-wallet" id="game-balance-live-casino-slots2">0,00
                        </td>
                        <td>Microgaming Arcade</td>
                        <td><span class="game-wallet" id="game-balance-direct-microgaming-arcade">0,00</td>
                        <td>Pragmatic Arcade</td>
                        <td><span class="game-wallet" id="game-balance-direct-pragmatic-arcade">0,00</td>
                    </tr>
                    <tr>
                        <td>Simple Play 2</td>
                        <td><span class="game-wallet" id="game-balance-simpleplay2">0,00</td>
                        <td>Fatpanda2</td>
                        <td><span class="game-wallet" id="game-balance-direct-fatpanda2">0,00</td>
                    </tr>
                    <tfoot>
                        <tr>
                            <th>Jumlah</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span
                                    class="totalWallet">{{ number_format(auth()->user()->balance, 2, ',', '.') }}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <span class="wallet"><i class="fas fa-money-bill"></i>IDR : </span>
            <span class="rb">
                <a href="#" class="" id="popover-balance" rel="popover">
                    IDR <span id="balance-holder" style="text-decoration: underline; cursor: pointer;">
                        {{ number_format(auth()->user()->balance, 2, ',', '.') }}
                    </span>
                    <span id="refresh-balance"><i class="fas fa-sync-alt"></i></span>
                </a>
                <img class="refresh-bal" alt="refresh"
                    src="https://classbet97x.space/idn/assets/img/icon/refreshing-blue.gif" />
                <a href="#" id="calibrate-balance" data-content="Kalibrasi Dompet" data-toggle="popover"
                    data-placement="bottom" data-trigger="hover" data-container="body"><i
                        class="fa fa-arrow-circle-up"></i></a>
            </span>
        </div>
        <div class="user-menu">
            <span class="opennewbig"><a href="javascript:void(0);" data-href="/deposit"
                    class="btn-depo btn btn-success">Deposit</a></span>
        </div>
    </div>
</div>
