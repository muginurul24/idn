<div class="text-center" id="new-provider-row">
    <x-mobile.slots.nav-link href="/slots" :active="request()->is('slots')" dataid="popular" position="0" logo="hot" event="false"
        new="false">HOT GAMES</x-mobile.slots.nav-link>
    <x-mobile.slots.nav-link href="/slots/new" :active="request()->is('slots/new')" dataid="new" position="25" logo="new-slot"
        event="false" new="false">NEW GAMES</x-mobile.slots.nav-link>
    <x-mobile.slots.nav-link href="/slots/exclusive" :active="request()->is('slots/exclusive')" dataid="exclusive" position="26"
        logo="exclusive" event="false" new="false">EXCLUSIVE</x-mobile.slots.nav-link>
    @foreach ($providers as $provider)
        <x-mobile.slots.nav-link href="/slots/{{ $provider->slug }}" :active="request()->is('slots/' . $provider->slug) ? true : false" dataid="{{ $provider->slug }}"
            position="{{ $provider->id }}" logo="{{ $provider->logo }}"
            event="{{ $provider->is_promo ? 'true' : 'false' }}"
            new="{{ $provider->is_new ? 'true' : 'false' }}">{{ $provider->short_name }}</x-mobile.slots.nav-link>
    @endforeach
</div>
