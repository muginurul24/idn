<x-mobile.layout>
    <div class="container mb-20">
        <div class="forms">
            @if ($errors->any())
                <div class="reg_content">
                    <div class="alert alert-danger" style="margin-top:15px;margin-right: 20px">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="mtb-10 other-links">
                <a href="/transaction/history" class=" btn btn-primary btn-xs"><i class="ico-history"></i>
                    <div>Histori Transaksi</div>
                </a>
            </div>
            <form method="post" action="/password/update" autocomplete="off">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Username Poker</td>
                            <td>:</td>
                            <td><span>{{ auth()->user()->username }}{{ '@' . Str::substr(Str::lower(config('app.name')), 0, 3) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Rekening</td>
                            <td>:</td>
                            <td><span id="account-name-holder-deposit">{{ auth()->user()->username }}</span></td>
                        </tr>
                        <tr>
                            <td>Nomor Rekening</td>
                            <td>:</td>
                            <td>
                                <span id="account-number-holder-deposit"
                                    data-bank="{{ Str::lower(auth()->user()->bank->bank_name) }}"
                                    data-bank-number="{{ auth()->user()->bank->account_number }}">
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Bank</td>
                            <td>:</td>
                            <td><span
                                    id="bank-name-holder-deposit">{{ Str::lower(auth()->user()->bank->bank_name) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Password Lama</td>
                            <td>:</td>
                            <td><input type="password" required="" class="form-control" name="old_password"
                                    id="old_password" placeholder="Password Lama"></td>
                        </tr>
                        <tr>
                            <td>Password Baru</td>
                            <td>:</td>
                            <td><input type="password" required="" class="form-control" name="password"
                                    id="new_password" placeholder="Password Baru">
                                <span id="helpBlock" class="help-block">Wajib Kombinasi Huruf dan Angka. <br /> Minimal
                                    karakter adalah 6. Contoh : strong889</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Konfirmasi Password Baru</td>
                            <td>:</td>
                            <td><input type="password" required="" class="form-control" name="password_confirmation"
                                    id="confirm_new_password" placeholder="Konfirmasi Password Baru"></td>
                        </tr>
                        <tr>
                            <td>Kode Validasi</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="captcha" required="" id="txt_verify"
                                    placeholder="Kode Validasi" maxlength="4"
                                    style="width: 175px; ime-mode: disabled; vertical-align: middle; margin-bottom: 5px;" />
                                <img style="width: 100px;" alt="verifycode" id="captcha-register"
                                    src="{{ captcha_src('flat') }}" class="verify-img pointer" />
                                <img alt="Refresh Code" id="re-captcha-register"
                                    src="https://classbet97x.space/idn/assets/img/icon/icon-refresh.png"
                                    class="refresh-img pointer" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                @csrf
                <button type="submit" class="btn btn-primary btn-block btn-lg" data-loading-text="MEMPROSES..."
                    autocomplete="off">GANTI PASSWORD</button>
            </form>
        </div>
    </div>
</x-mobile.layout>
