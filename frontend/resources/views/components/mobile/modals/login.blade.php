<div class="modal fade" id="loading-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="spinner-parlay spinner-initial-parlay" style="display: none;"></div>
</div>
<div class="modal modal-login fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="loginLabel">Login Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" id="submit-login" autocomplete="off">
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" name="username" required class="form-control" id="username"
                            placeholder="Username" />
                        <i class="fa fa-user fa-lg form-control-feedback"></i>
                    </div>
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Kata Sandi" required>
                        <i class="fa fa-lock fa-lg form-control-feedback"></i>
                        <span class="fa fa-eye toggle-password" id="showPasswordMobile"
                            style="position:absolute;cursor:pointer;color:grey;margin-left: 149px;margin-top: -25px;"></span>
                    </div>
                    <div class="form-group has-feedback has-feedback-left">
                        <input type="hidden" id="txtTargetCasino" name="target_casino" class="form-control" />
                    </div>
                    <div class="alert alert-danger mt-20" style="margin-top:15px;display: none;"
                        id="login-message-error"></div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block text-uppercase mtb-10">Masuk</button>

                    <a href="/password/reset">Lupa Kata Sandi ?</a>
                </form>
            </div>
            <div class="modal-footer">
                <a href="/register" class="btn btn-success btn-lg btn-block text-uppercase">Daftar</a>
            </div>
        </div>
    </div>
</div>
