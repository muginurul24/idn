<div style="margin-bottom: 44px;">
    <div style="text-align: center;">
        <ul style="display: grid; grid-template-columns: auto auto auto auto;">
            <li class="bank-status">
                <a class="bca online"></a>
            </li>
            <li class="bank-status">
                <a class="bni online"></a>
            </li>
            <li class="bank-status">
                <a class="ovo online"></a>
            </li>
            <li class="bank-status">
                <a class="gopay online"></a>
            </li>
            <li class="bank-status">
                <a class="linkaja online"></a>
            </li>
            <li class="bank-status">
                <a class="dana online"></a>
            </li>
            <li class="bank-status">
                <a class="QRIS online"></a>
            </li>
        </ul>
    </div>
    <div style="text-align: center;">
        <ul style="display: grid;">
            <li class="bank-info"><a></a></li>
        </ul>
    </div>
    <p><span>
            <h1>{{ config('app.name') . ' | ' . config('app.title') }}</h1>

            <p>
                Sebagai platform otoritas IDN Sport terpercaya, <a
                    href="{{ config('app.url') }}">{{ config('app.name') }}</a> hadir dengan
                layanan pengaduan online
                24/7 yang siap merespons setiap masukan dari masyarakat. Dengan dedikasi tinggi
                terhadap kualitas layanan, kami tidak hanya memfasilitasi pengguna dalam
                menyampaikan keluhan tetapi juga mendorong partisipasi aktif melalui saran
                konstruktif untuk perbaikan berkelanjutan.<br><br>Melalui sistem yang
                terintegrasi dan mudah diakses, masyarakat dapat memperoleh informasi terkini serta
                solusi
                cepat atas berbagai kendala seputar layanan olahraga. <a
                    href="{{ config('app.url') }}">{{ config('app.name') }}</a> berkomitmen
                menciptakan ekosistem yang transparan, responsif, dan berorientasi pada
                pengguna, demi pengalaman yang lebih efisien dan memuaskan bagi seluruh
                pelanggan.
            </p>

            <x-desktop.partials.hamburger-menu />
            <div class="footer-mobile mt-50" style="background-color:#343a40; height:100px">
                <p style="color:white;text-align:center;padding-top:14px;font-size:13px;">Licensed</p>
                <ul style="display:flex; flex-wrap:wrap;" class="ul-horizontal statement-img license">
                </ul>
            </div>
</div>
<div class="quick-footer">
    <div class="quick-footer-navbar">
        <ul class="navbar-grid">
            <li class="navbar-grid-a">
                <a href="{{ config('app.url') }}"
                    class="{{ request()->is('/') ? 'active grid-btn grid-btn-icon-top' : 'grid-btn grid-btn-icon-top' }}">
                    <i class="svg-home"></i>Beranda
                </a>
            </li>
            @guest
                <li class="navbar-grid-b">
                    <a href="/register"
                        class="{{ request()->is('register') ? 'active grid-btn grid-btn-icon-top' : 'grid-btn grid-btn-icon-top' }}">
                        <i class="svg-reg"></i>Daftar
                    </a>
                </li>
            @else
                <li class="navbar-grid-b">
                    <a href="/deposit"
                        class="{{ request()->is('deposit') ? 'active grid-btn grid-btn-icon-top' : 'grid-btn grid-btn-icon-top' }}">
                        <i class="svg-depo"></i>Deposit
                    </a>
                </li>
            @endguest
            <li class="navbar-grid-c">
                <a href="/promotion"
                    class="{{ request()->is('promotion') ? 'active grid-btn grid-btn-icon-top' : 'grid-btn grid-btn-icon-top' }}">
                    <i class="svg-promo"></i>Promosi
                </a>
            </li>
            <li class="navbar-grid-d">
                <a href="https://tawk.to/chat/{{ \App\Models\Contact::first()->livechat }}" target="_blank"
                    class="grid-btn grid-btn-icon-top">
                    <i class="svg-chat"></i>Live Chat
                </a>
            </li>
        </ul>
    </div>
</div>
