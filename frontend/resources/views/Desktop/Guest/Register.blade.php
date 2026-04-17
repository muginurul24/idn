<x-desktop.layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div>
                    <form id="reg-form" method="post" class="form-inline">
                        <div class="sub-bar">
                            <label class="text-center">Daftar Akun</label>
                        </div>
                        <div id="reg-main">
                            <div class="reg_content">
                                <div class="alert alert-danger" id="register-message-error"
                                    style="margin-top:15px;margin-right: 20px; display:none">
                                </div>
                            </div>
                            <div class="reg_content">
                                <b class="mb-10">Informasi Pribadi</b>
                                <table width="100%" border="0">
                                    <tr>
                                        <th width="15%"><span class="red">*</span>Nama Lengkap </th>
                                        <td width="85%">
                                            <div class="form-group" style="width: 330px;">
                                                <input type="text" class="form-control" style="width: 330px;"
                                                    value="" name="fullname" id="txt_name" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top"><span class="red">*</span>Email </th>
                                        <td>
                                            <div class="form-group" style="width: 330px;">
                                                <input type="text" class="form-control" style="width: 330px"
                                                    value="" name="email" placeholder="Email" id="txt_email"
                                                    maxlength="50" />
                                            </div>
                                            <br> <span id="email-rules"></span>
                                        </td>
                                    </tr>
                                    <tr hidden>
                                        <th valign="top"><span class="red">*</span>Mata Uang </th>
                                        <td>
                                            <select name="currency" id="txt_currency">
                                                <option value="257">
                                                    (IDR) Indonesia Rupiah
                                                </option>
                                            </select>
                                            <p
                                                style="margin: 5px 0; color: #777; padding-right: 5px; font-size: 10px; display: none;">
                                                Select the currency of your future account to determine the type of
                                                payment mode for future transaction.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span class="red">*</span>Mobile </th>
                                        <td>
                                            <div class="form-group" style="width: 330px;flex-direction: row;">
                                                <div class="input-group-prepend">
                                                    <span id="phone-prefix-label" class="input-group-text"
                                                        style="background-color: transparent; border: 1px solid transparent; color: #fff; font-size: 1.25rem;">+62</span>
                                                </div>
                                                <input type="hidden" id="phone-prefix" value="+62"
                                                    name="telephone_prefix">
                                                <input class="form-control" type="text" style="width: 288px"
                                                    value="" name="telephone" id="txt_mobile" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="reg_content">
                                <b class="mb-10">Informasi Akun</b>
                                <table width="100%" border="0">
                                    <tr>
                                        <th width="15%"><span class="red">*</span>Username </th>
                                        <td width="85%">
                                            <div class="form-group" style="width: 330px;">
                                                <input class="text-uppercase form-control" type="text"
                                                    class="form-control" style="width: 330px; ime-mode: disabled"
                                                    value="" name="username" id="txt_userid" required />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top" class="pt-10"><span class="red">*</span>Password
                                        </th>
                                        <td>
                                            <div class="form-group" style="width: 330px;">
                                                <input type="password" class="form-control" style="width: 330px"
                                                    name="password" placeholder="" id="txt_password" />
                                            </div>
                                            <span>Wajib kombinasi huruf dan angka.<br>Minimal 8 Karakter.<br>Contoh
                                                :strong889</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span class="red">*</span>Konfirmasi Kata Sandi </th>
                                        <td>
                                            <div class="form-group" style="width: 330px;">
                                                <input type="password" class="form-control" style="width: 330px"
                                                    name="password_confirmation" id="txt_confirm_pass" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="reg_content">
                                <b class="mb-10">Informasi Bank</b>
                                <table width="100%" border="0">
                                    <th valign="top"><span class="red">*</span>Nama Bank </th>
                                    <td>
                                        <select name="bank_name" id="txt_bank_name" onchange="checkMask()"
                                            style="width:330px;">
                                            <option>-- Pilih Bank --</option>
                                        </select>

                                    </td>
                                    <tr>
                                        <th width="15%"><span class="red">*</span> <span
                                                id="span-bank-acc-name"> Nama Rekening </span> </th>
                                        <td width="85%">
                                            <div class="form-group" style="width: 330px;">
                                                <input type="text" class="form-control"
                                                    style="width: 330px; ime-mode: disabled" value=""
                                                    name="account_name" id="txt_account_name" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="15%"><span class="red">*</span> <span
                                                id="span-bank-acc-number"> Nomor Rekening </span> </th>
                                        <td width="85%">
                                            <div class="form-group" style="width: 330px;">
                                                <input type="text" class="form-control"
                                                    style="width: 330px; ime-mode: disabled" value=""
                                                    name="account_number" id="txt_account_number" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top" class="pt-10"><span class="red">*</span>Kode
                                            Referral
                                        </th>
                                        <td>
                                            <div class="form-group" style="width: 330px;">
                                                <input type="text" class="form-control" style="width: 330px;"
                                                    name="referral_id" placeholder="" id="txt_referral_id"
                                                    value="{{ session('referral') ?? '' }}" />
                                            </div>
                                            <span class="red">*</span> <span>Opsional</span>
                                        </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <th><span class="red">*</span>Kode Validasi </th>
                                        <td>
                                            <div class="form-group" style="width: 330px;flex-direction: row;">
                                                <input type="text" class="form-control" style="width: 220px"
                                                    name="captcha" id="txt_verify" style="ime-mode: disabled"
                                                    maxlength="4" />
                                                <img alt="verifycode" id="captcha-register"
                                                    src="{{ captcha_src('flat') }}" class="verify-img pointer" />
                                                <img alt="Refresh Code" id="re-captcha-register"
                                                    src="https://classbet97x.space/idn/assets/img/icon/icon-refresh.png"
                                                    class="refresh-img pointer" />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="reg_content">
                                <table width="100%" border="0">
                                    <tr>
                                        <th width="3%" align="right" valign="top">
                                            <span class="red">*</span>
                                            <input name="agreement" type="checkbox" value="1" id="check_agree"
                                                checked="" />
                                        </th>
                                        <td width="97%" style="padding-right: 5px">
                                            Saya Menyatakan Bahwa Saya telah berumur setidaknya 18 tahun atau
                                            minimal
                                            umur sah di negara yang saya tinggal (mana yang lebih tinggi) dan bahwa
                                            saya
                                            telah membaca, mengerti dan Menyetujui <a class="opennew" href="#"
                                                data-href="page/terms-&-conditions" onclick="return false">Syarat dan
                                                Ketentuan</a> serta saya bersedia menerima email promosi.
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="clear"></div>
                            <div class="div-wrapper">
                                <button id="btn-submit-register" name="submitButton" value="Daftar"
                                    class="btn btn-primary btn-thin" style="width:280px; height:30px;">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
