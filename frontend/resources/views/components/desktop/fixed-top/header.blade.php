<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header-cover">
                <!-- navbar -->
                <div class="topmenu underline">
                    <ul class="list-unstyled list-inline float-right">
                        @guest
                            <li>
                                <a href="/password/reset">Lupa Kata Sandi ?</a>
                            </li>
                            <li>
                                <a target="_blank" href="/contact-us"><i class="fa fa-phone fa-flip-horizontal"></i>Hubungi
                                    Kami</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span><i class="fa fa-user"></i>Hi, {{ auth()->user()->username }}</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="opennewbig">
                                        <a href="javascript:void(0);" data-href="/transaction/history">
                                            <i class="fa fa-history"></i>Histori Transaksi</a>
                                    </li>
                                    <li>
                                        <a href="/password/change"><i class="fa fa-cog"></i>Ganti
                                            Kata Sandi</a>
                                    </li>
                                    <li class="opennewbig">
                                        <a href="javascript:void(0);" data-href="/memo"><i class="fa fa-envelope"></i>{{ $unreadMessage }} Unread Pesan</a>
                                    </li>
                                    <li class="opennewbig">
                                        <a href="javascript:void(0);" data-href="/withdraw"><i
                                                class="fa fa-arrow-up"></i>Withdraw</a>
                                    </li>
                                    <li role="presentation" class="divider"></li>
                                    <li class="join">
                                        <a href="#" id="btn-logout"><i class="fas fa-sign-out-alt"></i>Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/mybonus">
                                    Bonus Saya
                                </a>
                            </li>
                        @endguest
                        <li id="lang-menu" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span id="lang-header"><i class="fa fa-globe"></i>Bahasa</span><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right region">
                                <li><a href="/language/en" lang="en-US"><i class="ico_en"></i>English</a></li>
                                <li><a href="/language/id" lang="id-ID"><i class="ico_id"></i>Bahasa</a></li>
                                <li><a href="/language/vn" lang="vi-VN"><i class="ico_vi"></i>Tiếng Việt</a></li>
                            </ul>
                        </li>
                        @auth
                            <li>
                                <span class="opennewbig rb">
                                    <a href="javascript:void(0);" data-href="/referral">
                                        Kode Referral : {{ Str::upper(auth()->user()->username) }}
                                    </a>
                                </span>
                            </li>
                        @endauth
                        <li>
                            <a target="_blank" href="/ticket/create">
                                <i class="fa fa-exclamation-triangle"></i><span style="color:#f0ad4e">Pengaduan Customer</span>
                            </a>
                        </li>
                    </ul>
                </div> <!-- / navbar -->
                <div class="hdcontent">
                    <div class="logo" alt="{{ config('app.name') . ' | ' . config('app.title') }}">
                        <a title="{{ config('app.name') . ' | ' . config('app.title') }}"
                            href="{{ config('app.url') }}"></a>
                    </div>
                    @guest
                        <x-desktop.fixed-top.login-form></x-desktop.fixed-top.login-form>
                    @else
                        <x-desktop.fixed-top.login-panel></x-desktop.fixed-top.login-panel>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
