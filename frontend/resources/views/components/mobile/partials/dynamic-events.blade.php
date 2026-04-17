@foreach ($events as $event)
    <div class="tab-pane fade show active" id="{{ $event->slug }}-wrapper" data-type="" role="tabpanel">
        <div class="panel-group" id="{{ $event->slug }}-accordion">
            <img class="img-fluid lazyload mb-10" src="https://classbet97x.space/idn/assets/img/promotion-holder.webp"
                data-original="/storage/{{ $event->banner }}" alt="{{ Str::title($event->title) }}"
                data-toggle="collapse" data-target="#{{ $event->slug }}" role="button" aria-expanded="false"
                aria-controls="#{{ $event->slug }}">
            <div class="collapse" id="{{ $event->slug }}">
                {!! $event->description !!}
            </div>
        </div>
    </div>
@endforeach
