<div class="text-center" id="new-provider-row">
    <x-mobile.arcade.nav-link href="/arcadeGames" :active="request()->is('arcadeGames')" dataid="popular" position="0" logo="hot">HOT
        GAMES</x-mobile.arcade.nav-link>
    @foreach ($providers as $provider)
        <x-mobile.arcade.nav-link href="/arcadeGames/{{ $provider->slug }}" :active="request()->is('arcadeGames/' . $provider->slug)"
            dataid="{{ $provider->slug }}" position="{{ $provider->id }}" logo="{{ $provider->logo }}">{{ $provider->short_name }}</x-mobile.arcade.nav-link>
    @endforeach
</div>
