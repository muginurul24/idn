<x-desktop.layout>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div class="mb-xxxlg">
                    <form method="post" action="/password/update" id="reset-form" autocomplete="off">
                        @csrf
                        <div class="sub-bar">
                            <label class="text-center">Ganti Kata Sandi Anda</label>
                        </div>
                        @session('success')
                            <div id="reset-success" class="div-wrapper">
                                <p id="reset-txt" class="success-txt">
                                    Your password has been updated.
                                </p>
                            </div>
                        @else
                            <div id="reset-step1" class="pt-15">
                                @if ($errors->any())
                                <div class="reg_content div-wrapper">
                                    <div class="alert alert-danger" style="margin-top:15px;margin-right: 20px">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                <div class="reg_content2">
                                    <table class="tb-table">
                                        <tr>
                                            <th width="30%">Kata Sandi Lama :</th>
                                            <td width="70%">
                                                <input type="password" class="form-control text-uppercase"
                                                    name="old_password" required="" style="width: 245px" id="txt_userid"
                                                    maxlength="50" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th valign="top" class="pt-10" width="30%">Kata Sandi Baru :</th>
                                            <td width="70%">
                                                <input type="password" class="form-control text-uppercase" name="password"
                                                    required="" style="width: 245px" id="txt_userid" maxlength="50" />
                                                <span class="text-muted">
                                                    Wajib kombinasi huruf dan angka.<br>Minimal 8 Karakter.<br>Contoh
                                                    :strong889
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Konfirmasi Kata Sandi :</th>
                                            <td width="70%">
                                                <input type="password" class="form-control text-uppercase"
                                                    name="password_confirmation" required="" style="width: 245px"
                                                    id="txt_confirm_pass" maxlength="50" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Validasi :</th>
                                            <td width="70%">
                                                <input type="text" name="captcha" required=""
                                                    style="width: 158px; ime-mode: disabled; vertical-align: middle; display: inline-block;"
                                                    id="txt_verify" class="form-control" maxlength="4" />
                                                <img alt="verifycode" id="captcha-register" src="{{ captcha_src('flat') }}"
                                                    class="verify-img pointer" />
                                                <img alt="Refresh Code" id="re-captcha-register"
                                                    src="https://classbet97x.space/idn/assets/img/icon/icon-refresh.png"
                                                    class="refresh-img pointer" />
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="clear"></div>
                                <div class="div-wrapper">
                                    <button type="submit" name="submit" value="Next"
                                        class="btn btn-primary btn-thin">Reset</button>
                                </div>
                            </div>
                        @endsession
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
