<div class="col-sm-3 slot-sidebar">
    <ul class="nav menu slot-sidebar-nav">
        <li>
            <div class="search-input">
                <input type="text" class="form-control" placeholder="Cari game" id="search" onkeyup="gameSearch(this)" autocomplete="off">
            </div>
        </li>
        <x-desktop.partials.slots.side-link href="/slots" :active="request()->is('slots') ? true : false" event="false" new="false" logo="popular" dataid="popular">Game Populer</x-desktop.partials.slots.side-link>
        @foreach ($providers as $provider)
        <x-desktop.partials.slots.side-link href="/slots/{{ $provider->slug }}" :active="request()->is('slots/' . $provider->slug) ? true : false" event="{{ $provider->is_promo ? 'true' : 'false' }}" new="{{ $provider->is_new ? 'true' : 'false' }}" logo="{{ $provider->logo ?? 'idnslot' }}" dataid="{{ $provider->id }}">{{ $provider->short_name ?? 'IDN' }}</x-desktop.partials.slots.side-link>
        @endforeach
    </ul>
</div>
