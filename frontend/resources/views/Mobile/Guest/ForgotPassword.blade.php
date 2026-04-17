<x-mobile.layout>
    <div class="container mb-20">
        <div class="forms">
            <div class="mt-10 mb-5p">Reset Password Akun Anda</div>
            <form method="post" action="/password" autocomplete="off">
                @if ($errors->any())
                    <div class="reg_content div-wrapper">
                        <div class="alert alert-danger" style="margin-top:15px;margin-right: 20px">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="txt_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" class="form-control" name="captcha" id="validation"
                            placeholder="Kode Validasi">
                        <div class="input-group-addon"><img alt="verifycode" id="captcha-resetpass"
                                src="{{ captcha_src('flat') }}" class="verify-img pointer" />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger btn-block btn-lg" data-loading-text="MEMPROSES...">RESET
                    PASSWORD</button>
            </form>
        </div>
    </div>
</x-mobile.layout>
