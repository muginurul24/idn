<x-desktop.popup-layout>
    <div class="box_tables">
        <!-- Left col -->
        <div id="leftcol">
            <div id="leftcol_content">
                <div class="termsTitle2">
                    <span>Ringkasan Akun IDR</span>
                    <span style="float: right; padding-right: 10px;">
                        <a href="{{ config('app.url') }}">
                            <img alt="refresh" id="btnrefresh"
                                src="https://classbet97x.space/idn/assets/img/icon/icon-refresh-white.png"
                                style="cursor: pointer; vertical-align: middle;" title="Refresh" />
                        </a>
                    </span>
                </div>
                <span id="AccountBalanceContent">
                    <table class="walletList" id="WalletList" cellspacing="0">
                        <tbody>
                        </tbody>
                        <tr>
                            <td>Dompet Utama</td>
                            <td><span
                                    class="totalWallet">{{ number_format(auth()->user()->balance, 2, ',', '.') }}</span>
                            </td>
                        </tr>
                    </table>
                </span>
            </div>
        </div>
        <!-- End Left col -->
        <!-- Right col -->
        <div id="rightcol">
            <div id="navigation">
                <table id="tbNavigation" cellspacing="0" style="border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td class="{{ request()->is('deposit') ? 'active' : '' }}">
                                <a id="aLocalBankPayment" class="btnsIn4" href="/deposit">Deposit</a>
                            </td>
                            <td class="{{ request()->is('withdraw') ? 'active' : '' }}">
                                <a id="Withdrawal" class="btnsIn4" href="/withdraw">Penarikan
                                    Dana</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="content" class="content">
                @if ($allowed)
                    <div style="padding-top: 10px;" id="withdrawal">
                        <form method="post" action="/withdraw">
                            @csrf
                            <table class="tblPad">
                                <tr>
                                    <td>Jumlah Withdraw IDR </td>
                                    <td>
                                        <input id="withdraw" type="text" value="" name="withdraw"
                                            maxlength="15" required="" style="width: 280px; min-width: 280px"
                                            class="signup_input" oncopy="return false;" onpaste="return false" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div id="list-amount" class="list-amount">
                                            <div class="child-amount" data-amount="50000" onclick="addAmount(this)">50k
                                            </div>
                                            <div class="child-amount" data-amount="100000" onclick="addAmount(this)">
                                                100k</div>
                                            <div class="child-amount" data-amount="250000" onclick="addAmount(this)">
                                                250k</div>
                                            <div class="child-amount" data-amount="500000" onclick="addAmount(this)">
                                                500k</div>
                                            <div class="child-amount" data-amount="1000000" onclick="addAmount(this)">
                                                1jt</div>
                                            <div class="child-amount" data-amount="2000000" onclick="addAmount(this)">
                                                2jt</div>
                                            <div class="child-amount" data-amount="5000000" onclick="addAmount(this)">
                                                5jt</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kata Sandi </td>
                                    <td>
                                        <input required="" type="password" name="password" id="password"
                                            style="width: 280px; min-width: 280px" class="signup_input" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pilih Pembayaran
                                    </td>
                                    <td>
                                        <select name="payment" id="payment" class="signup_input"
                                            style="width: 290px;">
                                            <option value="{{ auth()->user()->bank->id }}">Bank Transfer</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bank </td>
                                    <td>
                                        <input required="" type="text" value="{{ auth()->user()->bank->bank_name }}" disabled="disabled"
                                            style="width: 280px; min-width: 280px" class="signup_input"
                                            id="input-bank-name" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Rekening</td>
                                    <td>
                                        <input required="" type="text" value="{{ auth()->user()->bank->account_name }}" disabled="disabled"
                                            style="width: 280px; min-width: 280px" class="signup_input" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening </td>
                                    <td>
                                        <input required="" type="text" value="{{ Str::mask(auth()->user()->bank->account_number, '*', 6) }}"
                                            style="width: 280px; min-width: 280px" disabled="disabled"
                                            class="signup_input" id="input-bank-accnumber" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="Btn_med_width">
                                            @if ($errors->any())
                                                <div class="alert alert-danger" style="margin-top:15px">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="Btn_med_width">
                                            <button id="submit-wd" type="submit"
                                                class="Btn Btn_floatLeft blueMedBtn">Kirim</button>
                                            <a id="btnCancel" class="Btn Btn_floatLeft whiteMedBtn">Batal</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div id="BaseMainContent_DepositMainContent_divDepositMsg" class="deposit_msgs"
                            style="margin-top: 10px">
                            1. Minimal Tarik Dana = 50.000,00 IDR .<br>
                            2. Penarikan dana hanya akan di proses ke rekening yang pertama kali di daftarkan. <br>
                            3. Setelah proses pengisian form Penarikan dana selesai maka pengiriman dana akan di proses
                            secepatnya ke dalam rekening terdaftar anda. <br>
                            4. Silahkan hubungin customer service kami via live chat atau memo untuk konfirmasi status
                            penarikan dana anda. <br>
                        </div>
                    </div>
                @else
                    <div style="padding-top: 10px;" id="localBankTransfer">
                        <center>
                            <div class="alert alert-success">
                                Permohonan anda telah di kirim, Silahkan tunggu operator kami untuk
                                memprosesnya.
                            </div>
                        </center>
                    </div>
                @endif
            </div>
        </div>
        <!-- End Right col -->
        <div style="clear:both;"></div>
    </div>
</x-desktop.popup-layout>
