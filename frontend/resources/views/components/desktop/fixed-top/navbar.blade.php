<!-- navbar -->
<div class="navbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills">
                    <x-desktop.fixed-top.nav-link href="{{ config('app.url') }}" :active="request()->is('/') ? true : false" new="false"
                        event="false" page="home">Beranda</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/sportsbook" :active="request()->is('sportsbook') ? true : false" new="true" event="false"
                        page="sports">Sports</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/casino" :active="request()->is('casino') ? true : false" new="true" event="false"
                        page="casino">Live Casino</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/idnpoker" :active="request()->is('idnpoker') ? true : false" new="true" event="false"
                        page="idnpoker">IDNPoker</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/slots" :active="request()->is('slots') || request()->is('slots/*') ? true : false" new="false" event="true"
                        page="slots">Slots</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/idnlive" :active="request()->is('idnlive') ? true : false" new="true" event="false"
                        page="idnlive">IDNLIVE</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/arcadeGames" :active="request()->is('arcadeGames') || request()->is('arcadeGames/*') ? true : false" new="true" event="false"
                        page="arcade">Arcade</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/tableGames" :active="request()->is('tableGames') ? true : false" new="false" event="false"
                        page="table">TABLE</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/idnraffle" :active="request()->is('idnraffle') ? true : false" new="false" event="false"
                        page="idnraffle">IDNRaffle</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/lottery" :active="request()->is('lottery') ? true : false" new="true" event="false"
                        page="lottery">Lottery</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/promotion" :active="request()->is('promotion') ? true : false" new="false" event="false"
                        page="promotion">Promosi</x-desktop.fixed-top.nav-link>
                    <x-desktop.fixed-top.nav-link href="/referrals" :active="request()->is('referrals') ? true : false" new="false" event="false"
                        page="referral">Referral</x-desktop.fixed-top.nav-link>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- / navbar -->
