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
                            <td class="active">
                                <a id="aLocalBankPayment" class="btnsIn4" href="/deposit">Deposit</a>
                            </td>
                            <td>
                                <a id="Withdrawal" class="btnsIn4" href="/withdraw">Penarikan
                                    Dana</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="content" class="content">
                @if ($allowed)
                    <div style="padding-top: 10px;" id="localBankTransfer">
                        <form method="post" action="/deposit" enctype="multipart/form-data">
                            @csrf
                            <table class="tblPad">
                                <tr class="non-crypto-field">
                                    <td>Jumlah Deposit <span id="currency-span">IDR</span></td>
                                    <td>
                                        <input type="text" maxlength="11" style="width: 306px;" id="deposit"
                                            name="deposit" required="" class="signup_input" oncopy="return false;"
                                            onpaste="return false" value="0" />
                                    </td>
                                </tr>
                                <tr class="pga-field" style="display: none">
                                    <td class="qr-note" style="display: none">&nbsp;</td>
                                    <td class="qr-note" style="display: none">
                                        <span class="account-note" id="qr_account_note"></span>
                                    </td>
                                </tr>
                                <tr class="pga-field" style="display: none">
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;Unique Amount</td>
                                    <td>
                                        <input type="text" style="width: 306px;" id="unique-ammount"
                                            name="unique-ammount" disabled />
                                    </td>
                                </tr>
                                <tr class="pga-field" style="display: none">
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;Total Amount</td>
                                    <td>
                                        <input type="text" style="width: 306px;" id="total-ammount"
                                            name="total-ammount" value="0" disabled />
                                    </td>
                                </tr>
                                <tr class="crypto-field" style="display: none">
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;Estimasi Jumlah IDR</td>
                                    <td>
                                        <input type="text" style="width: 306px;" id="crypto-est-ammount"
                                            name="crypto-est-ammount">
                                        <input type="hidden" style="width: 306px;" id="crypto-idr-ammount"
                                            name="crypto-idr-ammount">
                                        <input type="hidden" style="width: 306px;" id="crypto-rate-ammount"
                                            name="crypto-rate-ammount">
                                        <input type="hidden" style="width: 306px;" id="crypto-destination_bank"
                                            name="destination_bank">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div id="list-amount" class="list-amount non-crypto-field">
                                            <div class="child-amount" data-amount="10000" onclick="addAmount(this)">10k
                                            </div>
                                            <div class="child-amount" data-amount="50000" onclick="addAmount(this)">50k
                                            </div>
                                            <div class="child-amount" data-amount="100000" onclick="addAmount(this)">
                                                100k
                                            </div>
                                            <div class="child-amount" data-amount="250000" onclick="addAmount(this)">
                                                250k
                                            </div>
                                            <div class="child-amount" data-amount="500000" onclick="addAmount(this)">
                                                500k
                                            </div>
                                            <div class="child-amount" data-amount="1000000"
                                                onclick="addAmount(this)">1jt
                                            </div>
                                            <div class="child-amount" data-amount="2000000"
                                                onclick="addAmount(this)">2jt
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Pilih Pembayaran
                                    </td>
                                    <td>
                                        <select name="payment" id="payment" class="signup_input"
                                            style="width: 316px;">
                                            <option value="" disabled>Pilih Pembayaran</option>
                                            <option value="204" data-payment-slug="bank-transfer"
                                                data-type="normal" data-unique-amount="0" data-min-deposit="0"
                                                data-max-deposit="0" data-use-limit="0">Bank Transfer</option>
                                            <option value="1028" data-payment-slug="cellular-ballance"
                                                data-type="normal" data-unique-amount="0" data-min-deposit="0"
                                                data-max-deposit="0" data-use-limit="0">Cellular Balance</option>
                                            <option value="1029" data-payment-slug="e-wallet" data-type="normal"
                                                data-unique-amount="0" data-min-deposit="0" data-max-deposit="0"
                                                data-use-limit="0">E-Wallet</option>
                                            <option value="2735" data-payment-slug="pga" data-type="qr"
                                                data-unique-amount="1" data-min-deposit="10000">QRPay E-Wallet
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="choose-bank">
                                    <td>Pilih Bank</td>
                                    <td>
                                        <select name="destination_bank" id="destination-bank" class="signup_input"
                                            style="width: 316px;">
                                            <option value="">Pilih Bank</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="settlements">
                                    <td>
                                        Bukti Transfer
                                    </td>
                                    <td>
                                        <input type="file" name="settlements" id="settlements">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Note
                                    </td>
                                    <td>
                                        <textarea name="destination_note" id="destination-note" class="signup_input" style="width: 304px; height: 60px"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div class="Btn_med_width">
                                            <div class="link-note-button Btn_floatLeft" id="link-note-button"
                                                style="display: none">
                                                <a id="link-note" href="#"
                                                    class="btn linkBtn link-btn openlink"
                                                    style="white-space: normal;"></a>
                                            </div>
                                            <div class="ibank-button Btn_floatLeft" id="internet-banking-button"
                                                style="display: none">
                                                <a id="ibank-holder" href="#"
                                                    class="btn ibank-btn ibankBtn openbank">Login<br>I-Bank<div
                                                        id="ibank-img" class="ibank"
                                                        style="margin-top: -20px;margin-left: 5px; display: inline-block; vertical-align: middle;">
                                                    </div></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="non-pga-field">
                                    <td><span class="red">&nbsp;&nbsp;</span>Nama Bank</td>
                                    <td>
                                        <span id="bank-name-holder"></span>
                                    </td>
                                    <td rowspan="5" id="image-barcode-wraper" style="display: none">
                                        <img class="image-barcode" id="account-image-holder" src=""
                                            alt="">
                                    </td>
                                </tr>
                                <tr class="non-pga-field">
                                    <td><span class="red">&nbsp;&nbsp;</span>Nama Rekening</td>
                                    <td>
                                        <span id="account-name-holder"></span>
                                    </td>
                                </tr>
                                <tr class="non-pga-field">
                                    <td><span class="red">&nbsp;&nbsp;</span>Nomor Rekening</td>
                                    <td>
                                        <span id="account-number-holder"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="img-space" style="display: none">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="img-space" style="display: none">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr id="conversion-rate-row" style="display: none;">
                                    <td><span class="red">&nbsp;&nbsp;</span>Rate Konversi</td>
                                    <td><span id="conversion-rate-span">90</span>%</td>
                                </tr>
                                <tr id="conversion-result-row" style="display: none;">
                                    <td><span class="red">&nbsp;&nbsp;</span>Hasil Konversi</td>
                                    <td><input type="text" id="conversion-result-span" disabled=""></td>
                                </tr>
                                <tr id="fixed-fee-row" style="display: none;">
                                    <td><span class="red">&nbsp;&nbsp;</span>Fixed Fee</td>
                                    <td><span id="fixed-fee-span">0</span></td>
                                </tr>
                                <tr id="fixed-fee-result-row" style="display: none;">
                                    <td><span class="red">&nbsp;&nbsp;</span>Hasil Fixed Fee</td>
                                    <td><input type="text" id="fixed-fee-result-span" disabled=""></td>
                                </tr>
                                <tr>
                                    <td class="note-space" style="display: none">&nbsp;</td>
                                    <td class="note-space" style="display: none">
                                        <span class="account-note" id="bank_account_note"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
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
                                        <input type="hidden" id="bank-id-holder" value="" name="bank">
                                        <input type="hidden" id="unique-amount-input" value=""
                                            name="unique_amount">
                                        <div class="Btn_med_width">
                                            <button type="submit" id="submit-depo"
                                                class="Btn Btn_floatLeft blueMedBtn">Kirim</button>
                                            <a class="Btn Btn_floatLeft whiteMedBtn">Batal </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div class="deposit_msgs non-pga-msgs" id="non-pga-msgs" style="margin-top: 10px;">
                        </div>
                    </div>
                @elseif (!$allowed && $transaction->type == 'deposit' && $transaction->payment->bank_type == 'qris')
                    <div style="padding-top: 10px;" id="localBankTransfer">
                        <center>
                            <div style="color:white">
                                <div class="alert alert-info">
                                    <div>Kamu Memiliki Deposit Pending Sebesar :</div>
                                    <div>
                                        IDR {{ number_format($transaction->amount, 2, ',', '.') }}
                                        (Ref.no #{{ substr(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->timestamp, 1) }})
                                    </div>
                                    <div>Silahkan menyelesaikan transaksi sebelumnya. Detail transaksi dapat dilihat
                                        pada link dibawah ini.</div>
                                    <div class="qris-iframe">
                                        <iframe src="/pga/qris" frameborder="0" id="iframe-details"></iframe>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                @else
                    <div style="padding-top: 10px;" id="localBankTransfer">
                        <center>
                            <div class="alert alert-success">
                                Permohonan anda telah di kirim, Silahkan tunggu operator kami untuk memprosesnya.
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
