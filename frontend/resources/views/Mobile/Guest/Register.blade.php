<x-mobile.layout>
    <div class="container mb-xlg">
        <div class="forms">
            <h2>Daftar Akun</h2>
            <div class="mb-5p">Informasi Pribadi</div>
            <form method="post" id="reg-form" autocomplete="off">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="fullname" value="" name="fullname"
                        placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <input type="email" value="" name="email" placeholder="Email" class="form-control"
                        id="txt_email">
                    <span id="email-rules" class="help-block"></span>
                </div>
                <div class="form-group" hidden>
                    <select class="form-control" id="currency" name="currency">
                        <option value="257">
                            (IDR) Indonesia Rupiah
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div id="phone-prefix-label" class="input-group-text">+62</div>
                            <input type="hidden" id="phone-prefix" value="+62" name="telephone_prefix">
                        </div>
                        <input type="phone" class="form-control" id="phone" value="" name="telephone"
                            placeholder="Mobile">
                    </div>
                </div>

                <div class="mt-10 mb-5p">Informasi Akun</div>
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" required
                        placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password ">
                    <span id="helpBlock" class="help-block">Wajib kombinasi huruf dan angka.<br>Minimal 8
                        Karakter.<br>Contoh :strong889</span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation"
                        placeholder="Konfirmasi Kata Sandi">
                </div>

                <div class="mt-10 mb-5p">Informasi Bank</div>
                <div class="form-group">
                    <select class="form-control" id="txt_bank_name" name="bank_name" onchange="checkMask()">
                        <option value="">-- Pilih Bank --</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="" name="account_name" id="bank_account_name"
                        placeholder="Nama Rekening">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="txt_account_number" value=""
                        name="account_number" placeholder="Nomor Rekening">
                </div>
                <tr>
                    <th valign="top" class="pt-10"><span class="red">*</span>Kode Referral</th>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="referral_id" placeholder=""
                                id="txt_referral_id" value="{{ session('referral') ?? '' }}" /><span class="red">*</span>
                            <span>Opsional</span>
                        </div>
                    </td>
                </tr>
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" class="form-control" id="validation" name="captcha"
                            placeholder="Kode Validasi ">
                        <div class="input-group-addon">
                            <img alt="verifycode" id="captcha-register" src="{{ captcha_src('flat') }}"
                                class="verify-img pointer" />
                        </div>
                        <img alt="Refresh Code" id="re-captcha-register"
                            src="https://classbet97x.space/idn/assets/img/icon/icon-refresh.png"
                            class="refresh-img pointer" />
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="agreement" type="checkbox" value="1" id="check_agree" checked="">
                        Saya Menyatakan Bahwa Saya telah berumur setidaknya 18 tahun atau minimal umur sah di negara
                        yang saya tinggal (mana yang lebih tinggi) dan bahwa saya telah membaca, mengerti dan Menyetujui
                        Syarat dan Ketentuan serta saya bersedia
                        menerima email promosi.
                    </label>
                </div>
                <div class="reg_content">
                    <div class="alert alert-danger" id="register-message-error"
                        style="margin-top:15px;margin-right: 20px; display:none">
                    </div>
                </div>
                <button type="submit" id="btn-submit-register"
                    class="btn btn-primary btn-block btn-lg text-uppercase" data-loading-text="Loading..."
                    autocomplete="off">Daftar</button>
            </form>
        </div>
    </div>
</x-mobile.layout>
