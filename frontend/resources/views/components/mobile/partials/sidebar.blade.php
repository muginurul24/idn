<nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <x-mobile.partials.side-link href="{{ config('app.url') }}" :active="request()->is('/') ? true : false" new="false" event="false"
            logo="home">Beranda</x-mobile.partials.side-link>
        @auth
            <x-mobile.partials.side-link href="/deposit" :active="request()->is('deposit') ? true : false" new="false" event="false"
                logo="depo">Deposit</x-mobile.partials.side-link>
            <x-mobile.partials.side-link href="/withdraw" :active="request()->is('withdraw') ? true : false" new="false" event="false"
                logo="wd">Withdrawal</x-mobile.partials.side-link>
        @endauth
        <div class="sidebar-decoration"></div>
        <x-mobile.partials.side-link href="/sportsbook" :active="request()->is('sportsbook') ? true : false" new="true" event="false"
            logo="sport">Sports</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/casino" :active="request()->is('casino') ? true : false" new="true" event="true" logo="casino">Live
            Casino</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/idnpoker" :active="request()->is('idnpoker') ? true : false" new="true" event="false"
            logo="multiplyr">IDNPoker</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/slots" :active="request()->is('slots') || request()->is('slots/*') ? true : false" new="false" event="true"
            logo="slot">Slots</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/idnlive" :active="request()->is('idnlive') ? true : false" new="true" event="false"
            logo="toto">IDNLIVE</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/arcadeGames" :active="request()->is('arcadeGames') || request()->is('arcadeGames/*') ? true : false" new="true" event="false"
            logo="arcade">Arcade</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/tableGames" :active="request()->is('tableGames') ? true : false" new="false" event="false"
            logo="multiplyr">Table Games</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/lottery" :active="request()->is('lottery') ? true : false" new="true" event="true"
            logo="toto">Lottery</x-mobile.partials.side-link>
        <li>
            <a href="{{ auth()->check() ? '/open-game/lobby/casino' : '#' }}" @guest class="login-modal" data-toggle="modal" data-target="#login" @else target="_blank" @endguest>
                <i class="svg-idnraffle"></i> IDNRaffle
            </a>
        </li>
        <div class="sidebar-decoration"></div>
        @auth
            <x-mobile.partials.side-link href="/password/change" :active="request()->is('password/change') ? true : false" new="false" event="false"
                logo="password">Ubah Kata Sandi</x-mobile.partials.side-link>
            <x-mobile.partials.side-link href="/transaction/history" :active="request()->is('transaction/history') ? true : false" new="false" event="false"
                logo="history">Histori Transaksi</x-mobile.partials.side-link>
            <x-mobile.partials.side-link href="/memo" :active="request()->is('memo') ? true : false" new="false" event="false"
                logo="memo">Memo</x-mobile.partials.side-link>
        @endauth
        <x-mobile.partials.side-link href="{{ auth()->check() ? '/referral' : '/referrals' }}" :active="request()->is('referral') || request()->is('referrals') ? true : false"
            new="false" event="false" logo="fa-users">Referral</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/promotion" :active="request()->is('promotion') ? true : false" new="false" event="false"
            logo="promo">Promosi</x-mobile.partials.side-link>
        <x-mobile.partials.side-link href="/contact-us" :active="request()->is('contact-us') ? true : false" new="false" event="false"
            logo="contact">Hubungi Kami</x-mobile.partials.side-link>
        <li><a href="https://tawk.to/chat/{{ \App\Models\Contact::first()->livechat }}" target="_blank"><i class="svg-chat"></i> Live Chat</a></li>
        <x-mobile.partials.side-link href="/ticket/create" :active="request()->is('ticket/create') ? true : false" new="false" event="false"
            logo="chat-warning">Pengaduan Customer</x-mobile.partials.side-link>
        <div class="sidebar-decoration"></div>
        <div class="select-lang">
            <span>Pilih Bahasa:</span>
            <ul class="lang">
                <li class=""><a href="/language/en" lang="en-US"><i class="lang-en"></i></a></li>
                <li class="active"><a href="/language/id" lang="id-ID"><i class="lang-id"></i></a></li>
                <li class=""><a href="/language/vn" lang="vi-VN"><i class="lang-vi"></i></a></li>
            </ul>
        </div>
        <div class="btn-sidebar mx-auto" style="width: 100%;">
            @guest
                <a class="btn btn-primary btn-md text-uppercase" data-toggle="modal" data-target="#login">Masuk</a>
                <a href="/register" class="btn btn-success btn-md text-uppercase">Daftar</a>
            @else
                <a href="#" id="btn-logout" class="btn btn-default btn-md text-uppercase">Keluar</a>
                <a href="/deposit" class="btn btn-success btn-md text-uppercase">Deposit</a>
            @endguest
        </div>
        <div class="sidebar-decoration"></div>
        <div class="copyright">&amp;copy; {{ config('app.name') . ' | ' . config('app.title') }}. Hak Cipta
            Dilindungi.</div>
    </ul>
</nav>
