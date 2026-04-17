<!-- login modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog login-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="loginLabel">Login Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/login" id="formLoginPopup" autocomplete="off">
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" id="txtUserNamePopup" name="username" required autocomplete="on" title="Username"
                            class="form-control" placeholder="Username" autofocus />
                        <i class="fas fa-user fa-lg form-control-feedback"></i>
                    </div>
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" id="txtLoginPasswordPopup" name="password" title="Kata Sandi"
                            class="form-control" placeholder="Kata Sandi" required />
                        <i class="fas fa-lock fa-lg form-control-feedback"></i>
                    </div>
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="hidden" id="txtTargetCasino" name="target_casino" class="form-control" />
                    </div>
                    <div class="alert alert-danger mt-10" style="display:none;" id="login-message-error">
                        <ul></ul>
                    </div>
                    <input type="submit" id="btnLoginPopup" name="Submit"
                        class="btn btn-primary btn-md btn-block text-uppercase mtb-10" value="Masuk" />
                    <a href="/password/reset">Lupa Kata Sandi ?</a>
                </form>
            </div>
            <div class="modal-footer">
                <a href="/register" class="btn btn-success btn-md btn-block text-uppercase">Daftar</a>
            </div>
        </div>
    </div>
</div>
<!-- / login modal -->
