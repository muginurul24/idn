<x-mobile.layout>
    <div class="container mb-20">
        <div class="forms">
            @if ($allowed)
                <form method="post" action="/withdraw" autocomplete="off">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-top:15px">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div>IDR</div>
                            </div>
                            <input name="withdraw" type="tel" class="form-control" id="withdraw_amount"
                                placeholder="Jumlah Withdraw">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8 list-amount-col">
                            <div id="list-amount" class="list-amount">
                                <div class="child-amount" data-amount="50000" onclick="addAmount(this)">50k</div>
                                <div class="child-amount" data-amount="100000" onclick="addAmount(this)">100k</div>
                                <div class="child-amount" data-amount="250000" onclick="addAmount(this)">250k</div>
                                <div class="child-amount" data-amount="500000" onclick="addAmount(this)">500k</div>
                                <div class="child-amount" data-amount="1000000" onclick="addAmount(this)">1jt</div>
                                <div class="child-amount" data-amount="2000000" onclick="addAmount(this)">2jt</div>
                                <div class="child-amount" data-amount="5000000" onclick="addAmount(this)">5jt</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Kata Sandi">
                    </div>
                    <div class="form-group">
                        <select name="payment" id="payment" class="form-control">
                            <option value="204-{{ auth()->user()->bank->id }}">Bank Transfer</option>
                        </select>
                    </div>

                    <div class="mt-10">Dana akan dikirim ke :</div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Bank</td>
                                <td>:</td>
                                <td>{{ auth()->user()->bank->bank_name }}</td>
                            </tr>
                            <tr>
                                <td>Nama Rekening</td>
                                <td>:</td>
                                <td>{{ auth()->user()->bank->account_name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>:</td>
                                <td>
                                    <span id="label-bank-number" data-bank="bca"
                                        data-bank-number="{{ Str::mask(auth()->user()->bank->account_number, '*', 6) }}">
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block btn-lg text-uppercase"
                        data-loading-text="Loading..." autocomplete="off" id="submit-wd">Kirim</button>
                    <div class="notes mt-20">
                        1. Minimal Tarik Dana = 50.000,00 IDR .<br>
                        2. Penarikan dana hanya akan di proses ke rekening yang pertama kali di daftarkan. <br>
                        3. Setelah proses pengisian form Penarikan dana selesai maka pengiriman dana akan di proses
                        secepatnya ke dalam rekening terdaftar anda. <br>
                        4. Silahkan hubungin customer service kami via live chat atau memo untuk konfirmasi status
                        penarikan
                        dana anda. <br>
                    </div>
                </form>
            @else
                <div class="alert alert-danger" style="margin-top:15px">
                    <ul>
                        <li>Mohon tunggu sebentar, operator kami sedang menyelesaikan transaksi anda sebelumnya.</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-mobile.layout>
