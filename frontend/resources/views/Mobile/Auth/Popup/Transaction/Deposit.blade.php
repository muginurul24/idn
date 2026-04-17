<x-mobile.layout>
    <div class="container mb-20">
        @if ($errors->any())
            <div id="depo-feedback" class="alert alert-danger text-center mt-10" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="forms">
            <div id="copy-success-deposit" class="alert alert-info" role="alert" hidden>
                <strong>Copied to clipboard!</strong>
            </div>
            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession
            @if ($allowed)
                <form method="post" action="/deposit" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group non-crypto-field">
                            <div class="input-group-addon">
                                <div><span id="currency-span">IDR</span></div>
                            </div>
                            <input type="text" class="form-control deposit" name="deposit" id="deposit-amount"
                                placeholder="Jumlah Deposit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 list-amount-col">
                            <div id="list-amount" class="list-amount non-crypto-field">
                                <div class="child-amount" data-amount="10000" onclick="addAmount(this)">10k</div>
                                <div class="child-amount" data-amount="50000" onclick="addAmount(this)">50k</div>
                                <div class="child-amount" data-amount="100000" onclick="addAmount(this)">100k</div>
                                <div class="child-amount" data-amount="250000" onclick="addAmount(this)">250k</div>
                                <div class="child-amount" data-amount="500000" onclick="addAmount(this)">500k</div>
                                <div class="child-amount" data-amount="1000000" onclick="addAmount(this)">1jt</div>
                                <div class="child-amount" data-amount="2000000" onclick="addAmount(this)">2jt</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5p mb-5p" id="qr-note-wraper" style="padding: 0 20px;">
                        <span class="account-note" id="qr_account_note"></span>
                    </div>
                    <div class="unique-amount">
                        <div class="row mt-5p mb-5p pga-field" style="padding: 0 10px; display: none">
                            <div class="col-4 no-padding mt-5p mb-5p">&nbsp;&nbsp;&nbsp;&nbsp;Unique Amount</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p unique-ammount"><span id="unique-ammount"></span>
                            </div>
                        </div>

                        <div class="row mt-5p mb-5p pga-field" style="padding: 0 10px; display: none">
                            <div class="col-4 no-padding mt-5p mb-5p">&nbsp;&nbsp;&nbsp;&nbsp;Total Amount</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p"><span id="total-ammount"></span></div>
                        </div>

                        <div class="row mt-5p mb-5p crypto-field" style="padding: 0 10px; display: none">
                            <div class="col-4 no-padding mt-5p mb-5p">Estimasi Jumlah IDR</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p">
                                <input type="text" id="crypto-est-ammount" class="input-crypto crypto-est-ammount"
                                    name="crypto-est-ammount">
                                <input type="hidden" id="crypto-idr-ammount" name="crypto-idr-ammount">
                                <input type="hidden" id="crypto-rate-ammount" name="crypto-rate-ammount">
                                <input type="hidden" id="crypto-destination_bank" name="destination_bank">
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="payment" id="payment" class="form-control">
                                <option value="" disabled>Pilih Pembayaran</option>
                                <option value="204" data-payment-slug="bank-transfer" data-type="normal"
                                    data-unique-amount="0" data-min-deposit="0" data-max-deposit="0" data-use-limit="0">
                                    Bank
                                    Transfer</option>
                                <option value="1028" data-payment-slug="cellular-ballance" data-type="normal"
                                    data-unique-amount="0" data-min-deposit="0" data-max-deposit="0"
                                    data-use-limit="0">
                                    Cellular Balance</option>
                                <option value="1029" data-payment-slug="e-wallet" data-type="normal"
                                    data-unique-amount="0" data-min-deposit="0" data-max-deposit="0"
                                    data-use-limit="0">
                                    E-Wallet</option>
                                <option value="2735" data-payment-slug="pga" data-type="qr" data-unique-amount="1"
                                    data-min-deposit="10000">QRPay E-Wallet</option>
                            </select>
                        </div>

                        <div id="choose-bank" class="form-group">
                            <select name="destination_bank" id="destination-bank-deposit" class="form-control">
                                <option value="">Pilih Bank</option>
                            </select>
                        </div>

                        <div class="form-group" id="bukti-tf">
                            <div class="input-group non-crypto-field">
                                <div class="input-group-addon">
                                    <div><span id="currency-span">Bukti Transfer</span></div>
                                </div>
                                <input type="file" class="form-control deposit" name="settlements"
                                    id="settlements">
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="destination_note" id="destination-note" placeholder="Note"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-6 link-note-button" id="link-note-button"
                                style="display: none; padding-right: 0px;">
                                <a id="link-note" href="#" target="_blank"
                                    class="btn btn-block btn-link-note-button mt-10"></a>
                            </div>
                            <div class="col-6" id="internet-banking-button"
                                style="display: none; padding-left: 10px;">
                                <a id="ibank-holder-deposit" target="_blank" class="btn btn-block btn-ibank mt-10">
                                    Login<br>I-Banking <div id="ibank-img-deposit" class="ibank"
                                        style="margin-top: -20px;margin-left: 5px;"></div>
                                </a>
                            </div>
                        </div>

                        <div class="mt-20">Silakan deposit ke :</div>

                        <div class="row non-pga-field" style="padding: 0 10px;">
                            <div class="col-4 no-padding mt-5p mb-5p">Nama Bank</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p"><span id="bank-name-holder-deposit"></span>
                            </div>
                        </div>

                        <div class="row mt-5p mb-5p non-pga-field" style="padding: 0 10px;">
                            <div class="col-4 no-padding mt-5p mb-5p">Nama Rekening</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p"><span id="account-name-holder-deposit"></span>
                            </div>
                        </div>

                        <div class="row mt-5p mb-5p" style="padding: 0 10px; display: none;"
                            id="conversion-rate-row">
                            <div class="col-4 no-padding mt-5p mb-5p">Rate Konversi</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p"><span id="conversion-rate-span"></span> %</div>
                        </div>

                        <div class="row mt-5p mb-5p" style="padding: 0 10px; display: none;"
                            id="conversion-result-row">
                            <div class="col-4 no-padding mt-5p mb-10">Hasil Konversi</div>
                            <div class="col-1 no-padding mt-5p mb-10">:</div>
                            <div class="col-7 no-padding mb-10">
                                <input type="text" class="form-control"id="conversion-result-span" disabled=""
                                    style="color: black">
                            </div>
                        </div>

                        <div class="row mt-5p mb-5p" style="padding: 0 10px; display: none;" id="fixed-fee-row">
                            <div class="col-4 no-padding mt-5p mb-5p">Fixed Fee</div>
                            <div class="col-1 no-padding mt-5p mb-5p">:</div>
                            <div class="col-7 no-padding mt-5p mb-5p"><span id="fixed-fee-span"></span></div>
                        </div>

                        <div class="row mt-5p mb-5p" style="padding: 0 10px; display: none;"
                            id="fixed-fee-result-row">
                            <div class="col-4 no-padding mt-5p mb-10">Hasil Fixed Fee</div>
                            <div class="col-1 no-padding mt-5p mb-10">:</div>
                            <div class="col-7 no-padding mb-10">
                                <input type="text" class="form-control"id="fixed-fee-result-span" disabled=""
                                    style="color: black">
                            </div>
                        </div>

                        <div class="row mt-5p mb-5p  non-pga-field" style="padding: 0 10px;">
                            <div class="col-4 no-padding mt-5p mb-10">Nomor Rekening</div>
                            <div class="col-1 no-padding mt-5p mb-10">:</div>
                            <div class="col-5 no-padding mb-10"><input type="text" class="form-control"
                                    id="account-number-holder-deposit" readonly=""></div>
                            <div class="col-2 no-padding mb-10"><button type="button" id="copy-button-holder"
                                    class="btn btn-success btn-game no-margin">Copy</button></div>
                        </div>

                        <div class="row mt-5p mb-5p image-wraper" id="image-barcode-wraper"
                            style="padding: 0 10px; display: none">
                            <img class="image-barcode" id="account-image-holder" src="" alt="">
                        </div>

                        <div class="row mt-5p mb-5p" id="account-note-wraper" style="padding: 0 20px;">
                            <span class="account-note" id="bank_account_note"></span>
                        </div>

                        <input type="hidden" id="bank-id-holder" value="" name="bank">
                        <input type="hidden" id="unique-amount-input" value="" name="unique_amount">

                        <button type="submit" class="btn btn-primary btn-block btn-lg text-uppercase"
                            id="submit-depo" data-loading-text="Loading..." autocomplete="off">Kirim</button>

                        <div class="mt-20 non-pga-msgs" id="non-pga-msgs">
                        </div>
                </form>
            @elseif (!$allowed && $transaction->type == 'deposit' && $transaction->payment->bank_type == 'qris')
                <div id="depo-feedback" class="alert alert-info text-center mt-10" role="alert">
                    Kamu Memiliki Deposit Pending Sebesar : {{ number_format($transaction->amount, 2, ',', '.') }}
                    (Ref.no
                    #{{ substr(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->timestamp, 1) }})
                    <br>
                    <div class="mb-10">Silahkan menyelesaikan transaksi sebelumnya. Detail transaksi dapat dilihat pada link dibawah
                        ini.</div>
                    <div class="qris-iframe">
                        <iframe src="/pga/qris" frameborder="0" id="iframe-details"></iframe>
                    </div>
                </div>
            @else
                <div id="depo-feedback" class="alert alert-info text-center mt-10" role="alert">
                    Kamu Memiliki Deposit Pending Sebesar : {{ number_format($transaction->amount, 2, ',', '.') }}
                    (Ref.no
                    #{{ substr(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->timestamp, 1) }})<br>
                </div>
            @endif
        </div>
    </div>
</x-mobile.layout>
