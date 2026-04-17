<x-desktop.layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div class="mb-xxxlg">
                    <form method="post" action="/password" id="reset-form" autocomplete="off">
                        @csrf
                        <div class="sub-bar">
                            @if (session()->has('reset'))
                                <label class="text-center">Kata Sandi Anda Berhasil Diperbarui</label>
                            @else
                                <label class="text-center">Setel Ulang Kata Sandi Anda</label>
                            @endif
                        </div>
                        @if (session()->has('reset'))
                            <div id="reset-success" class="div-wrapper">
                                <p id="reset-txt" class="success-txt">
                                    Berikut adalah pembaruan kata sandi anda. <br> Silahkan gunakan kata sandi berikut
                                    untuk proses login. <br> <strong>{{ session('reset') }}</strong>
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
                                    <b>Informasi Pendaftaran</b>
                                    <table class="tb-table">
                                        <tr>
                                            <th width="30%">Username :</th>
                                            <td width="70%">
                                                <input type="text" name="username" required style="width: 245px"
                                                    id="txt_userid" maxlength="50" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Email :</th>
                                            <td width="70%">
                                                <input type="text" name="email" required style="width: 245px"
                                                    id="txt_email" maxlength="50" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="30%">Validasi :</th>
                                            <td width="70%">
                                                <input type="text" name="captcha" required
                                                    style="width: 158px; ime-mode: disabled; vertical-align: middle;display: inline-block;"
                                                    id="txt_verify" maxlength="4" class="form-control" />
                                                <img alt="verifycode" id="captcha-register"
                                                    src="{{ captcha_src('flat') }}" class="verify-img pointer" />
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
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
