<div class="row">
    <div class="col-12">
        @foreach ($events as $event)
            <div class="panel panel-default" type="special">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-10">
                            <img alt="promoimg" class="imgholder editable img-fluid lazyload"
                                src="https://classbet97x.space/idn/assets/img/promotion-holder.webp"
                                data-original="/storage/{{ $event->banner }}">
                        </div>
                        <div class="col-sm-2">
                            <div class="btns">
                                <a href="{{ auth()->check() ? config('app.url') : '/register' }}"
                                    class="btn btn-primary btn-joinnow">
                                    <span class="text">{{ auth()->check() ? 'MAINKAN' : 'DAFTAR' }}</span>
                                    <span class="caret"></span>
                                </a>
                                <a class="btn btn-default accordion-toggle dropdown-toggle" data-toggle="collapse"
                                    href="#pspecial-collapse-{{ $event->slug }}" role="button" aria-expanded="false"
                                    aria-controls="#pspecial-collapse-{{ $event->slug }}">SYARAT
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-content panel-collapse collapse" id="pspecial-collapse-{{ $event->slug }}">
                    <div class="panel-body editable">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
