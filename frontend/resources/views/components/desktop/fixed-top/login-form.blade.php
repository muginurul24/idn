<!-- header login -->
<div class="login-panel float-right">
    <form method="post" action="/login" id="formLoginHeader" autocomplete="OFF">
        <input type="text" id="txtUserName" name="username" tabindex="1" autocomplete="on" title="Username"
            class="input-login" placeholder="Username" required />
        <input type="password" id="txtLoginPassword" name="password" tabindex="2" title="Kata Sandi"
            style="padding-right:27px;" class="input-login" placeholder="Kata Sandi" required />
        <span class="fas fa-eye toggle-password" id="showPassword"
            style="position:absolute;color:grey;cursor:pointer;padding: 10px 15px 3px 5px;margin-left: -26px;"></span>
        <input type="submit" id="btnLogin" name="Submit" tabindex="3" value="Masuk"
            class="btn-login btn btn-primary" />
        <a class="btn-login btn btn-success" id="btn-register" href="/register" tabindex="4">Daftar</a>
    </form>
</div>
<!-- / header login -->
