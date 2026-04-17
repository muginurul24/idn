<div class="col-2 casino-lobby-nav-area no-padding">
    <x-desktop.partials.casino.side-link href="/casino" :active="request()->is('casino') ? true : false" event="false" logo="lobby">lobby</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/roulette" :active="request()->is('casino/lobby/roulette') ? true : false" event="false" logo="roulette">Roulette</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/baccarat" :active="request()->is('casino/lobby/baccarat') ? true : false" event="true" logo="baccarat">Baccarat</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/sicbo" :active="request()->is('casino/lobby/sicbo') ? true : false" event="false" logo="sicbo">Sicbo</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/wheel" :active="request()->is('casino/lobby/wheel') ? true : false" event="false" logo="wheel">Wheel</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/dragon-tiger" :active="request()->is('casino/lobby/dragon-tiger') ? true : false" event="false" logo="dragontiger">Dragon Tiger</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/fantan" :active="request()->is('casino/lobby/fantan') ? true : false" event="false" logo="fantan">Fantan</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/blackjack" :active="request()->is('casino/lobby/blackjack') ? true : false" event="false" logo="blackjack">Blackjack</x-desktop.partials.casino.side-link>
    <x-desktop.partials.casino.side-link href="/casino/lobby/special-games" :active="request()->is('casino/lobby/special-games') ? true : false" event="false" logo="special">Special Games</x-desktop.partials.casino.side-link>
</div>
