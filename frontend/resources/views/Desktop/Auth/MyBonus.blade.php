<x-desktop.layout>
    <div class="container content-body">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div class="home-info row">
                    <div class="col-8 col-md-left">
                        <div class="home-content">
                            <h1 class="text-center">New Bonus System</h1>
                            <h4 class="text-center">Mainkan untuk mendapatkan BONUS lebih!</h4>
                            <p class="text-center">Semakin banyak Anda bermain, semakin cepat level Anda naik dan
                                mendapatkan berbagai bonus mingguan!</p>
                            <div class="rank-list">
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-copper.svg"
                                        alt="Copper Rank" />
                                    <span>Copper</span>
                                </div>
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-bronze.svg"
                                        alt="Bronze Rank" />
                                    <span>Bronze</span>
                                </div>
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-silver.svg"
                                        alt="Silver Rank" />
                                    <span>Silver</span>
                                </div>
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-gold.svg"
                                        alt="Gold Rank" />
                                    <span>Gold</span>
                                </div>
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-diamond.svg"
                                        alt="Diamond Rank" />
                                    <span>Diamond</span>
                                </div>
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-platinum.svg"
                                        alt="Platinum Rank" />
                                    <span>Platinum</span>
                                </div>
                                <div>
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-vip.svg"
                                        alt="VIP Rank" />
                                    <span>VIP</span>
                                </div>
                            </div>
                            <div class="rank-progress">
                                <div class="rank-progress-img">
                                    <img class="rank-list-img"
                                        src="https://classbet97x.space/idn/assets/img/user-rank/rank-{{ $point->level }}.svg" />
                                </div>
                                <div class="rank-progress-detail">
                                    <div class="rank-current-level-text">Your current level</div>
                                    <div class="rank-current-level">{{ Str::title($point->level) }}</div>
                                    <div class="progress progress-big active">
                                        <div class="progress-bar progress-bar-big progress-bar-success"
                                            role="progressbar" data-transitiongoal="{{ $point->point }}.00" aria-valuemax="{{ $valueMax }}.00"
                                            aria-valuemin="0"></div>
                                    </div>
                                </div>
                            </div>
                            <table class="rank-table text-center" width="100%" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <td>Game</td>
                                        <td>Bonus Saat Ini (%)</td>
                                        <td></td>
                                        <td>Level Selanjutnya (%)</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Live Casino &amp; Slots</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>IDNPoker</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>UBO Sports</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>2.00</td>

                                    </tr>
                                    <tr>
                                        <td>SBO Sports</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>5.00</td>

                                    </tr>
                                    <tr>
                                        <td>Opus Casino</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Casino</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>CMD Sports</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>Habanero</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Live</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Microgaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Isoftbet</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Virtual</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>SBO Slot</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Ho Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>ION Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Playtech</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Sexy Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Vivo Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Live</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>CQ9</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>TFGaming</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>Song 88</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>SBO Casino Virtual</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Golden Race</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>-</td>

                                    </tr>
                                    <tr>
                                        <td>T1 PP Live Dealer</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Simple Play</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>UltraPlay</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>Triple One</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.50</td>
                                    </tr>
                                    <tr>
                                        <td>PG</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Slot</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>HoGaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>PP Live Dealer</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Vivo Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>ISoftBet</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>ION Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Opus Gaming</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>HB Fishing</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.20</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic B</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>MM BOLATANGKAS</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Habanero GMW</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Saba Sports</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>Saba E-Sports</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>Pragmatic Direct 6</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>UPG</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Habanero Direct 2</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Microgaming Direct 2</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Sport Seamless</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>5.00</td>

                                    </tr>
                                    <tr>
                                        <td>SBO Virtual Seamless</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>3.00</td>

                                    </tr>
                                    <tr>
                                        <td>SBO Casino Seamless</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Sexy Seamless</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic Direct</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>TotoSingapore</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Net22</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Rng</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Raffle</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic Direct RTP</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Playtech 2</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.30</td>
                                    </tr>
                                    <tr>
                                        <td>IDN RNG</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>SG8 Arcade</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Microgaming Arcade</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic Arcade</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>TTG</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Microgaming Grand</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Nsoft Sportsbook</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>1.00</td>

                                    </tr>
                                    <tr>
                                        <td>ELottery</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>Reevo</td>
                                        <td>0</td>

                                        <td>
                                            <center>rolling</center>
                                        </td>

                                        <td>0.10</td>
                                    </tr>
                                    <tr>
                                        <td>SBO FunkyGames Seamless</td>

                                        <td>0</td>

                                        <td>
                                            <center>cashback</center>
                                        </td>

                                        <td>1.00</td>

                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <p class="text-center">Untuk informasi lebih lanjut silahkan hubungi kami atau klik pada
                                    bagian PROMOSI </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-right">
                        <div class="quick-action opennewbig">
                            <p>Tombol untuk pengisian dana ke dompet utama</p>
                            <a href="javascript:void(0);" data-href="/deposit"
                                class="btn btn-full btn-success mb-20">Deposit</a>
                            <p>Tombol untuk penarikan dana ke rekening Anda</p>
                            <a href="javascript:void(0);" data-href="/withdraw"
                                class="btn btn-full btn-primary mb-20">Withdraw</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
