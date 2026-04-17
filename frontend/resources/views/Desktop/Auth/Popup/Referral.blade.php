<x-desktop.popup-layout>
    <div id="referral-content" class="box_tables">
        <div class="row">
            <div class="col-7">
                <div class="rounded-box">
                    <div class="rounded-box top-box">
                        <h3 class="text-center">Link Referral</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-7">
                                    <input type="text" readonly="" class="ref-input" name="ref-link"
                                        id="ref-link-home" value="{{ Str::replace('https://', '', config('app.url')) }}?ref={{ auth()->user()->username }}">
                                    <label class="ref-info">Link ini akan mengarah ke page Home</label>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-success" style="width: 84%" onclick="cClipR()">COPY</a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-7">
                                    <input type="text" readonly="" class="ref-input" name="ref-link"
                                        id="ref-link" value="{{ Str::replace('https://', '', config('app.url')) }}/register?ref={{ auth()->user()->username }}">
                                    <label class="ref-info">Link ini akan mengarah ke page Register</label>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-success" style="width: 84%" onclick="cClip()">COPY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-box-content" style="height: 15%">
                        <div class="text-center">
                            <a href="https://www.facebook.com" style="color: #3b5998"><i
                                    class="fab fa-facebook-square"></i></a>
                            <a href="https://www.twitter.com" style="color: #00aced"><i
                                    class="fab fa-twitter-square"></i></a>
                            <a href="https://plus.google.com" style="color: #dd4b39"><i
                                    class="fab fa-google-plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div style="position: relative;">
                    <div class="rounded-box" style="height: 275px;">
                        <div class="rounded-box top-box" style="width: 100%;height: 25%;">
                            <h5 class="text-center" style="margin-top:2%">BONUS KOMISI REFERRAL</h5>
                        </div>
                        <div class="rounded-box-content"
                            style="top: 25%; font-size: 12px; height: 75%; overflow-y: auto">
                            <div class="text-center" style="padding: 0 15px;">
                                <table class="commision-table">
                                    <tr>
                                        <td>UBO Sports</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Live Casino &amp; Slots</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>IDNPoker</td>
                                        <td class="text-right">Hingga 0.2%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Sports</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Opus Casino</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Casino</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>CMD Sports</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Live</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Habanero</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Microgaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Isoftbet</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Virtual</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Slot</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Ho Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>ION Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Playtech</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Sexy Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>CQ9</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Vivo Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Live</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>TFGaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Song 88</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Golden Race</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Casino Virtual</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>T1 PP Live Dealer</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Simple Play</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>UltraPlay</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>PG</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>HoGaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>IDN Slot</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>ISoftBet</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Vivo Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>ION Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>PP Live Dealer</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>HB Fishing</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>TotoMacau</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Opus Gaming</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic B</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic Direct 6</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Habanero Direct 2</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Microgaming Direct 2</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Sport Seamless</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Casino Seamless</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Virtual Seamless</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>SBO Sexy Seamless</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Pragmatic Direct</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                    <tr>
                                        <td>Playtech 2</td>
                                        <td class="text-right">Hingga 5%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="padding-top: 2%">
            <div class="rounded-box mx-auto" style="width: 97%; height: 350px;">
                <div class="row max-row" style="display: flex;">
                    <div class="col-sm-12 tablink-wrapper">
                        <div class="row max-row" style="display: flex;">
                            <div class="col tablink  active" id="referral-history-link"
                                data-target = "referral-history">Histori Komisi</div>
                            <div class="col tablink" id="referral-downline-link" data-target = "referral-downline">
                                Downline</div>
                            <div class="col tablink" id="referral-downline-passive-link"
                                data-target = "referral-downline-passive">Downline Passive</div>
                            <div class="col tablink" id="referral-rule-link" data-target = "referral-rule">Aturan
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>

                <!-- Start of referral history -->
                <div class="tablink-content" id="referral-history" style="overflow-y: auto;">
                    <div class="row max-row" style="display: flex; padding-top: 2%;">
                        <div class="col-6">
                            <div class="row max-row" style="display: flex;">
                                <div class="col-2" style="margin-right: -5%">
                                    <span style="font-size: 14px">Period:</span>
                                </div>
                                <div class="col-6" style="margin-right: -15%">
                                    <select id="period" style="width: 70%; border: 0px;">
                                        <option value="2025-05-05">2025-05-05</option>
                                        <option disabled="">------------------------------------------</option>
                                        <option value="2025-05-05"> 2025-05-05 </option>
                                        <option value="2025-04-28"> 2025-04-28 </option>
                                        <option value="2025-04-21"> 2025-04-21 </option>
                                        <option value="2025-04-14"> 2025-04-14 </option>
                                        <option value="2025-04-07"> 2025-04-07 </option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <input type="button" onclick="searchIt()" class="btn-blue" value="Submit"
                                        id="sub" />
                                </div>
                            </div>
                        </div>
                        <div class="col-6"> </div>
                    </div>
                    <div class="row max-row" style="display: flex; padding-top: 2%;">
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
                    </div>
                    <div style="padding-left: 2%; color: white;">
                        NOTE: Kualifikasi untuk mendapatkan bonus referral minimal 3 pemain aktif sebagai bawahan
                        referral.
                    </div>
                </div>
                <!-- End of referral history -->
                <!-- Start of downline -->
                <div class="tablink-content" id="referral-downline" style="overflow-y: auto; display: none">
                    <div class="row max-row" style="display: flex; padding-top: 1%;">
                        <div class="text-center mx-auto" style="width: 300px;">Tidak Ada data.</div>
                    </div>
                </div>
                <!-- End of downline -->
                <!-- Start of passive downline -->
                <div class="tablink-content" id="referral-downline-passive" style="overflow-y: auto; display: none">
                    <div class="row max-row" style="display: flex; padding-top: 1%;">
                        <div class="text-center mx-auto" style="width: 300px;">Tidak Ada data.</div>
                    </div>
                </div>
                <!-- End of passive downline -->
                <!-- Start of rule -->
                <div class="tablink-content" id="referral-rule" style="overflow-y: auto; display: none">
                    <div class="row max-row" style="display: flex; padding-top: 1%;">
                        <div style="padding : 1%;">
                            Cara menghitung Bonus Referral :<br>
                            Hitungan bonus referral untuk produk SPORT, CASINO dan IDNLIVE 1.00 % – 5.00 % dari total
                            kekalahan<br>
                            Perkalian dihitung dari LOSE<br>
                            <br>
                            <table style="width: 50%">
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
                <!-- End of rule -->
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
</x-desktop.popup-layout>
