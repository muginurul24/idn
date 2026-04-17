<x-mobile.layout>
    <div class="container referral-container">
        <h3>Sistem Referral</h3>

        <div class="rounded-box-wrapper">
            <div class="rounded-box bottom-box"></div>
            <div class="rounded-box top-box">
                <h5>Link Referral</h5>
                <div class="referral-input">
                    <input type="text" readonly="" class="ref-input" name="ref-link" id="ref-link-home"
                        value="{{ Str::replace('https://', '', config('app.url')) }}?ref={{ auth()->user()->username }}">
                    <label class="ref-info">Link ini akan mengarah ke page Home</label>
                    <a class="btn btn-success btn-copy" onclick="cClipR()">COPY</a>
                </div>
                <div class="referral-input">
                    <input type="text" readonly="" class="ref-input" name="ref-link" id="ref-link"
                        value="{{ Str::replace('https://', '', config('app.url')) }}/register?ref={{ auth()->user()->username }}">
                    <label class="ref-info">Link ini akan mengarah ke page Daftar</label>
                    <a class="btn btn-success btn-copy" onclick="cClip()">COPY</a>
                </div>
                <div class="icon-wrapper">
                    <a href="https://www.facebook.com" style="color: #3b5998"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.twitter.com" style="color: #00aced"><i class="fab fa-twitter-square"></i></a>
                    <a href="https://plus.google.com" style="color: #dd4b39"><i
                            class="fab fa-google-plus-square"></i></a>
                </div>
            </div>
        </div>

        <div class="rounded-box-wrapper">
            <div class="rounded-box information-box-bottom">
                <div class="container">
                    <div class="row">
                        <div class="{{ request()->has('page') ? 'col-3 tablink-wrapper' : 'col-3 tablink-wrapper selected' }}" id="referral-history-link"
                            data-target="referral-history">
                            <div class="tablink" id="referral-history-link" data-target="referral-history">
                                Histori
                            </div>
                        </div>
                        <div class="{{ request()->has('page') ? 'col-3 tablink-wrapper selected' : 'col-3 tablink-wrapper' }}" id="referral-downline-link"
                            data-target="referral-downline">
                            <div class="tablink">
                                Downline
                            </div>
                        </div>
                        <div class="col-3 tablink-wrapper" id="referral-info-link" data-target="referral-info">
                            <div class="tablink">
                                Info Komisi
                            </div>
                        </div>
                        <div class="col-3 tablink-wrapper" style="border-right: 0px" id="referral-rule-link"
                            data-target="referral-rule">
                            <div class="tablink">
                                Aturan
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tablink-target" id="referral-history" style="{{ request()->has('page') ? 'display: none' : 'display: block' }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-2">
                                <span style="font-size: 14px">Period:</span>
                            </div>
                            <div class="col-xs-7" style="padding-right: 0px;">
                                <select id="period"
                                    style="width: 100%; border: 0px; background-color: #1a1a1a; color: #fff;">
                                    <option value="{{ now()->format('Y-m-d') }}">{{ now()->format('Y-m-d') }}</option>
                                    <option disabled="">------------------------------------------</option>
                                    <option value="{{ now()->addDay()->format('Y-m-d') }}">
                                        {{ now()->addDay()->format('Y-m-d') }} </option>
                                    <option value="{{ now()->addDays(2)->format('Y-m-d') }}">
                                        {{ now()->addDays(2)->format('Y-m-d') }} </option>
                                    <option value="{{ now()->addDays(3)->format('Y-m-d') }}">
                                        {{ now()->addDays(3)->format('Y-m-d') }} </option>
                                    <option value="{{ now()->addDays(4)->format('Y-m-d') }}">
                                        {{ now()->addDays(4)->format('Y-m-d') }} </option>
                                    <option value="{{ now()->addDays(5)->format('Y-m-d') }}">
                                        {{ now()->addDays(5)->format('Y-m-d') }} </option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <input type="button" onclick="searchIt()" class="btn-blue" value="Submit"
                                    id="sub" />
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px">
                        <table class='referral-report-table'>
                            <tr>
                                <th class="text-center">Akumulasi Turnover</th>
                                <th class="text-center">Akumulasi Winlose</th>
                                <th class="text-center">Jumlah Bonus</th>
                            </tr>
                            <tr>
                                <td style="text-align: center;" colspan="3">Tidak Ada data.</td>
                            </tr>
                        </table>
                        <div>
                            NOTE: Kualifikasi untuk mendapatkan bonus referral minimal 3 pemain aktif sebagai bawahan
                            referral.
                        </div>
                    </div>
                </div>

                <div class="tablink-target" id="referral-downline" style="{{ request()->has('page') ? 'display: block' : 'display: none' }}">
                    @if ($downlines->count() > 0)
                        <table class="referral-downline-table" id="referral-downline-table"
                            style="margin-bottom: 25px;">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Total Deposit</th>
                                    <th>Tanggal Bergabung</th>
                                </tr>
                                @foreach ($downlines as $key => $downline)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td style="text-align: center">{{ $downline->username }}</td>
                                        <td style="text-align: center">{{ number_format($downline->transactions()->where('type', 'deposit')->where('status', 'approved')->where('is_manual', false)->sum('amount') ?? 0, 0, ',', '.') }}</td>
                                        <td style="text-align: center">{{ $downline->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="w-100 d-flex justify-content-center">
                            {{ $downlines->links() }}
                        </div>
                    @else
                        <span>Tidak Ada data.</span>
                    @endif
                </div>
                <div class="tablink-target" id="referral-info" style="display: none">
                    <table class="referral-downline-table">
                        <tr>
                            <th colspan="2">BONUS KOMISI REFERRAL</th>
                        </tr>
                        <tr>
                            <td style="text-align: left">UBO Sports</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Live Casino &amp; Slots</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">IDNPoker</td>
                            <td style="text-align: right;">Hingga 0.2%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Sports</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Opus Casino</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Casino</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">CMD Sports</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">IDN Live</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Habanero</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Pragmatic</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Microgaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Isoftbet</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Virtual</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Slot</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Ho Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">ION Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Playtech</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Sexy Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">CQ9</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Vivo Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Live</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">TFGaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Song 88</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Golden Race</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Casino Virtual</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">T1 PP Live Dealer</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Simple Play</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">UltraPlay</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">PG</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">HoGaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">IDN Slot</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">ISoftBet</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Vivo Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">ION Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">PP Live Dealer</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">HB Fishing</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">TotoMacau</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Opus Gaming</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Pragmatic B</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Pragmatic Direct 6</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Habanero Direct 2</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Microgaming Direct 2</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Sport Seamless</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Casino Seamless</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Virtual Seamless</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">SBO Sexy Seamless</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Pragmatic Direct</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Playtech 2</td>
                            <td style="text-align: right;">Hingga 5%</td>
                        </tr>
                    </table>
                </div>

                <div class="tablink-target" id="referral-rule" style="display: none">

                    <div style="padding : 1%; text-align: left;">
                        Cara menghitung Bonus Referral :<br>
                        Hitungan bonus referral untuk produk SPORT, CASINO dan IDNLIVE 1.00 % – 5.00 % dari total
                        kekalahan<br>
                        Perkalian dihitung dari LOSE<br>
                        <br>
                        <table style="width: 100%">
                            <tr>
                                <td>Akumulasi Winlose</td>
                                <td>Jumlah Bonus</td>
                            </tr>
                            <tr>
                                <td>0,00 - 5.000.000,00</td>
                                <td class="text-center">1%</td>
                            </tr>
                            <tr>
                                <td>5.000.000,00 - 20.000.000,00</td>
                                <td class="text-center">2%</td>
                            </tr>
                            <tr>
                                <td>20.000.000,00 - 50.000.000,00</td>
                                <td class="text-center">3%</td>
                            </tr>
                            <tr>
                                <td>50.000.000,00 - 100.000.000,00</td>
                                <td class="text-center">4%</td>
                            </tr>
                            <tr>
                                <td>Di atas 100.000.000,00</td>
                                <td class="text-center">5%</td>
                            </tr>
                        </table>
                        <br>
                        Contoh<br>
                        Akumulasi Winlose 1.000.000,00 x 1.00% = 10.000,00 <br>
                        Akumulasi Winlose 20.000.000,00 x 2.00% = 400.000,00
                        <br><br>
                        Hitungan bonus referral untuk produk Poker 0.10 % – 0.20 % dari Turnover<br>
                        Perkalian dihitung dari turnover<br>
                        <br>
                        <table style="width: 50%">
                            <tr>
                                <td>Akumulasi Turnover</td>
                                <td>Jumlah Bonus</td>
                            </tr>
                            <tr>
                                <td>0,00 - 100.000.000,00</td>
                                <td class="text-center">0.1%</td>
                            </tr>
                            <tr>
                                <td>Di atas 100.000.000,00</td>
                                <td class="text-center">0.2%</td>
                            </tr>
                        </table>
                        <br>
                        Contoh<br>
                        Akumulasi Turnover 1.000.000,00 x 0.10% = 1.000,00 <br>
                        Akumulasi Turnover 100.000.000,00 x 0.20% = 200.000,00
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-mobile.layout>
