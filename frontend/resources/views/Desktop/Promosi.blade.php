<x-desktop.layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div class="tab">
                    <ul class="nav nav-tabs" id="tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pspecial" role="tab"
                                aria-controls="special" aria-selected="true">All Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pparlay" role="tab" aria-controls="parlay"
                                aria-selected="true">Limited
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pspecial" role="tabpanel" aria-labelledby="special">
                            @foreach ($newMemberEvents as $key => $event)
                                <div class="panel panel-default" type="special" itemid="{{ $key + 1 }}" sortid="{{ $key + 1 }}">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <img alt="promoimg" class="imgholder editable img-fluid lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/promotion-holder.webp"
                                                    data-original="/storage/{{ $event->banner }}"
                                                    sid="{{ $key + 1 }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="btns">
                                                    <a href="{{ auth()->check() ? config('app.url') : '/register' }}"
                                                        class="btn btn-primary btn-joinnow">
                                                        <span
                                                            class="text">{{ auth()->check() ? 'MAINKAN' : 'DAFTAR' }}</span>
                                                        <span class="caret"></span>
                                                    </a>
                                                    <a class="btn btn-default accordion-toggle dropdown-toggle"
                                                        data-toggle="collapse"
                                                        href="#pspecial-collapse-{{ $event->slug }}" role="button"
                                                        aria-expanded="false"
                                                        aria-controls="#pspecial-collapse-{{ $event->slug }}">SYARAT
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-content panel-collapse collapse"
                                        id="pspecial-collapse-{{ $event->slug }}">
                                        <div class="panel-body editable">
                                            {!! $event->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="pparlay" role="tabpanel" aria-labelledby="parlay">
                            @foreach ($limitedEvents as $key => $event)
                                <div class="panel panel-default" type="special" itemid="{{ $key + 1 }}" sortid="{{ $key + 1 }}">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <img alt="promoimg" class="imgholder editable img-fluid lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/promotion-holder.webp"
                                                    data-original="/storage/{{ $event->banner }}" sid="{{ $key + 1 }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="btns">
                                                    <a href="{{ auth()->check() ? config('app.url') : '/register' }}"
                                                        class="btn btn-primary btn-joinnow">
                                                        <span
                                                            class="text">{{ auth()->check() ? 'MAINKAN' : 'DAFTAR' }}</span>
                                                        <span class="caret"></span>
                                                    </a>
                                                    <a class="btn btn-default accordion-toggle dropdown-toggle"
                                                        data-toggle="collapse"
                                                        href="#pspecial-collapse-{{ $event->slug }}" role="button"
                                                        aria-expanded="false"
                                                        aria-controls="#pspecial-collapse-{{ $event->slug }}">SYARAT
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-content panel-collapse collapse"
                                        id="pspecial-collapse-{{ $event->slug }}">
                                        <div class="panel-body editable">
                                            {!! $event->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <style>
                            hr {
                                border: 0;
                                border-top: 4px double #ECECEC;
                                text-align: center;
                            }

                            hr:after {
                                display: inline-block;
                                position: relative;
                                top: -15px;
                                padding: 0 10px;
                                background: #fff;
                                color: #ECECEC;
                                font-size: 18px;
                            }
                        </style>
                        <hr>
                        <x-desktop.partials.dynamic-events />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-desktop.layout>
