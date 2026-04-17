<x-mobile.layout>
    <div class="container mb-xlg">
        <div class="mt-10 tabs">
            <!-- Nav tabs -->
            <ul id="promo-tab" class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#ppromo" role="tab" aria-controls="promo"
                        aria-selected="true">All Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pparlay" role="tab" aria-controls="parlay"
                        aria-selected="true">Limited
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade  show active " id="ppromo" role="tabpanel" aria-labelledby="promo">
                    <div class="panel-group" id="ppromo-accordion">
                        @foreach ($newMemberEvents as $event)
                            <h5>{{ Str::title($event->title) }}</h5>
                            <img class="img-fluid lazyload mb-10"
                                src="https://classbet97x.space/idn/assets/img/promotion-holder.webp"
                                data-original="/storage/{{ $event->banner }}" alt="{{ Str::title($event->title) }}"
                                data-toggle="collapse" data-target="#{{ $event->slug }}" role="button"
                                aria-expanded="false" aria-controls="#{{ $event->slug }}">
                            <div class="collapse" id="{{ $event->slug }}">
                                {!! $event->description !!}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade " id="pparlay" role="tabpanel" aria-labelledby="parlay">
                    <div class="panel-group" id="pparlay-accordion">
                        @foreach ($limitedEvents as $event)
                            <h5>{{ Str::title($event->title) }}</h5>
                            <img class="img-fluid lazyload mb-10"
                                src="https://classbet97x.space/idn/assets/img/promotion-holder.webp"
                                data-original="/storage/{{ $event->banner }}"
                                alt="{{ Str::title($event->title) }}" data-toggle="collapse" data-target="#{{ $event->slug }}"
                                role="button" aria-expanded="false" aria-controls="#{{ $event->slug }}">
                            <div class="collapse" id="{{ $event->slug }}">
                                {!! $event->description !!}
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <x-mobile.partials.dynamic-events />
            </div>
        </div>
    </div>
</x-mobile.layout>
