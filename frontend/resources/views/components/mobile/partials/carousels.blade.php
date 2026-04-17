<div class="owl-carousel owl-theme">
    @foreach ($carousels as $carousel)
        <div class="item">
            <div class="slider-btn">
                @guest
                    <a class="btn-slider btn btn-primary text-uppercase" href="#" data-toggle="modal" data-target="#login" data-backdrop="static" style="font-size: 0.7rem;" data-keyboard="false">Mainkan</a>
                    <a class="btn btn-success text-uppercase" href="/register" style="font-size: 0.7rem;">Daftar</a>
                @else
                    <a class="btn btn-success text-uppercase low-padding" href="{{ $carousel->link ?? '/slots' }}">Main Sekarang</a>
                @endguest
            </div>
            <img class="lazyload responsive-image" src="https://classbet97x.space/idn/assets/mobile/img/home-slider-holder.webp" data-original="/storage/{{ $carousel->image }}" alt="{{ $carousel->alt ?? config('app.name') }}" title="{{ $carousel->alt ?? config('app.name') }}" />
        </div>
    @endforeach
</div>
