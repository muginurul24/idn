<div class="col-sm-12 content-all">
    <div id="main-slide" class="mb-10">
        <div class="col-sm-8 no-padding col-xs-left">
            <div class="btn-slider-wrap">
                @guest
                    <a class="btn-slider btn btn-primary" href="#" data-toggle="modal" data-target="#login"
                        data-backdrop="static" data-keyboard="false">Mainkan</a>
                    <a class="btn-slider btn btn-success" href="/register">Daftar</a>
                @endguest
            </div>
            <div class="slide-wrapper">
                <div class="main-slider owl-carousel owl-theme">
                    @foreach ($firstSequences as $first)
                        <div class="item">
                            <img class="lazyload" src="https://classbet97x.space/idn/assets/img/game-slider-holder.webp"
                                data-original="/storage/{{ $first->image }}" alt="{{ Str::title($first->alt) }}"
                                title="{{ Str::title($first->alt) }}" />
                            @if (auth()->check() && $first->link != null)
                                <a class="btn btn-success text-uppercase low-padding" href="{{ $first->link }}"
                                    style="position: absolute; top: 85%; left: 75%;">Main Sekarang</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg offset-lg-6 no-padding col-xs-right">
            <div id="promo-slide1" class="promo1">
                <div class="owl-carousel owl-theme">
                    @foreach ($secondSequences as $second)
                        <div class="item">
                            <img class="promo-banner lazyload"
                                src="https://classbet97x.space/idn/assets/img/game-slider2-holder.webp"
                                data-original="/storage/{{ $second->image }}" alt="{{ Str::title($second->alt) }}"
                                title="{{ Str::title($second->alt) }}" />
                            @if (auth()->check() && $second->link != null)
                                <a class="btn btn-success text-uppercase low-padding" href="{{ $second->link }}"
                                    style="position: absolute; top: 73%; left: 3%;">Main Sekarang</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="promo-slide2" class="promo2 mt-5">
                <div class="owl-carousel owl-theme">
                    @foreach ($thirdSequences as $third)
                        <div class="item">
                            <img class="promo-banner lazyload"
                                src="https://classbet97x.space/idn/assets/img/game-slider2-holder.webp"
                                data-original="/storage/{{ $third->image }}" alt="{{ Str::title($third->alt) }}"
                                title="{{ Str::title($third->alt) }}" />
                            @if (auth()->check() && $third->link != null)
                                <a class="btn btn-success text-uppercase low-padding" href="{{ $third->link }}"
                                    style="position: absolute; top: 73%; left: 3%;">Main Sekarang</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="misc mb-xlg">
        @foreach ($latestBanners as $latest)
            <a class="" target="_blank" href="{{ $latest->link ?? '/slots' }}">
                <img class="lazyload" src="https://classbet97x.space/idn/assets/img/game-slider2-holder.webp" data-original="/storage/{{ $latest->image }}" alt="{{ Str::title($latest->alt) }}" title="{{ Str::title($latest->alt) }}" />
            </a>
        @endforeach
    </div>
    <div class="modal fade" id="show-banner-modal" tabindex="-1" role="dialog" style="z-index: 999999;">
        <div class="modal-dialog" role="document">
            <div class="modal-content popup-background">
                <div class="modal-header banner-header" style="padding-bottom: 15px;">
                    <button type="button" class="close"
                        style="padding: 1rem; position: absolute; top:2%; right:8px; font-size: 4rem;"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body banner-body" style="padding-top: 0">
                    <a href="{{ $modal->link ?? '/referrals' }}">
                        <img class="img-fluid lazyload"
                            src="https://classbet97x.space/idn/assets/img/game-slider-holder.webp"
                            data-original="/storage/{{ $modal->image }}" alt="{{ Str::title($modal->alt) }}"
                            title="{{ Str::title($modal->alt) }}" />
                    </a>
                    <input type="hidden" name="is_enabled" id="is-enabled" value="1">
                </div>
            </div>
        </div>
    </div>
</div>
