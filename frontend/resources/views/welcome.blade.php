<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') . ' | ' . config('app.title') }}</title>
    <meta name="title" content="{{ config('app.name') . ' | ' . config('app.title') }}">
    <meta name="description" content="{{ config('app.description') }}">
    <meta name="keywords" content="{{ config('app.keyword') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <link rel="canonical" href="{{ config('app.url') }}/rtp">
    <link rel="preconnect" href="https://classbet97x.space">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo:wght@400;600;700;800;900&family=Ubuntu:wght@400;500;700&display=swap">
    <link rel="shortcut icon" type="image/png" href="/storage/{{ config('app.favicon') }}">
    <link rel="stylesheet" href="https://classbet97x.space/idn/rtp/assets/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="https://classbet97x.space/idn/rtp/assets/css/ace.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/idn/rtp/assets/css/acevid.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">
    <link rel="stylesheet" href="https://classbet97x.space/idn/rtp/assets/css/style.css" crossorigin="anonymous">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="{{ config('app.name') . ' | ' . config('app.title') }}">
    <meta property="og:description" content="{{ config('app.description') }}">
    <meta property="og:image" content="/storage/{{ config('app.card_image') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title" content="{{ config('app.name') . ' | ' . config('app.title') }}">
    <meta property="twitter:description" content="{{ config('app.description') }}">
    <meta property="twitter:image" content="/storage/{{ config('app.card_image') }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ route('sitemap') }}">
    <meta name="robots" content="index, follow">
    {{-- <script type="application/ld+json">{"@context": "https://schema.org", "@type": "WebSite", "name": "Bocoran Admin Slot Gacor Hari Ini | RTP Live Bocoran {{ config('app.name') }}", "url": "{{ config('app.url') . '/rtp' }}"}</script> --}}
</head>

<body
    style="background-image:url({{ config('app.cdn') . '/idn/rtp/bg.jpg' }});background-position:center;background-size: cover; background-attachment: fixed; background-repeat: no-repeat;">
    <nav class="container" style="background: #111111e0;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="logo justify-content-center justify-content-md-start">
                    <a href="{{ config('app.url') }}">
                        <img src="/storage/{{ config('app.desktop_logo') }}"
                            alt="Bocoran Admin Slot Gacor Hari Ini | RTP Live Bocoran Liga788">
                    </a>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <div class="menu" style="color: white;">
                    <ul>
                        <li>
                            <a href="{{ config('app.url') }}/promotion">
                                <i class='bx bx-football'></i>
                                Promo
                            </a>
                        </li>
                        <li>
                            <a href="{{ config('app.url') }}">
                                <i class='bx bx-book-content'></i>
                                <span class="text-nowrap">Daftar Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://tawk.to/chat/{{ $contact->livechat }}" class="text-gradient">
                                <i class='bx bx-stats'></i>
                                <span class="text-nowrap">Live Chat</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ config('app.url') }}">
                                <i class='bx bxs-bolt'></i>
                                <span class="text-nowrap">Login</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ config('app.url') }}/register" class="btn btn-primary" target="_blank">
                                <span class="text-nowrap">Register</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="primary">
        <div class="fixed-menu d-block d-md-none">
            <div class="container px-0">
                <div class="fixed-menu-cont">
                    <div class="row">
                        <a href="{{ config('app.url') }}/promotion" class="col fixed-menu-item">
                            <div class="fixed-menu-icon">
                                <i class='bx bx-football'></i>
                            </div>
                            <div class="fixed-menu-text">Promo</div>
                        </a>
                        <a href="{{ config('app.url') }}" class="col fixed-menu-item">
                            <div class="fixed-menu-icon">
                                <i class='bx bx-book-content'></i>
                            </div>
                            <div class="fixed-menu-text" style="font-size:12px">D Admin</div>
                        </a>
                        <a href="https://tawk.to/chat/{{ $contact->livechat }}" class="col fixed-menu-item">
                            <div class="fixed-menu-icon">
                                <i class='bx bx-stats text-gradient'></i>
                            </div>
                            <div class="fixed-menu-text text-gradient">Live Chat</div>
                        </a>
                        <a href="{{ config('app.url') }}/register" class="col fixed-menu-item">
                            <div class="fixed-menu-icon">
                                <i class='bx bxs-bolt'></i>
                            </div>
                            <div class="fixed-menu-text">Login</div>
                        </a>
                        <a href="{{ config('app.url') }}/register" class="col fixed-menu-item" target="_blank">
                            <div class="fixed-menu-icon">
                                <i class='bx bx-joystick'></i>
                            </div>
                            <div class="fixed-menu-text">Register</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="background: #111111e0;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-gradient">Bocoran Admin Slot Gacor Hari Ini | RTP Live Bocoran
                    {{ config('app.name') }}</h1>
                <div class="mb-2 text-secondary text-center">
                    <span class="title-text"></span>
                </div>
                <div class="slideshow-images-container" style="display: block; border-radius: 10px;">
                    @foreach ($carousels as $carousel)
                    <div class="slideshow-images fade-slideshow-images">
                        <img src="/storage/{{ $carousel->image }}"
                            style="width:100%; min-height: 100px; background: black; border-radius: 10px;"
                            class="lazyload" loading="lazy" alt="{{ Str::title($carousel->alt) }}" />
                    </div>
                    @endforeach
                    <a class="prev-slideshow-images" onclick="plusSlidesImages(-1)">&#10094;</a>
                    <a class="next-slideshow-images" onclick="plusSlidesImages(1)">&#10095;</a>
                </div>
                <br>
                <hr>
            </div>
            <div class="col-12">
                <div style="padding: 7px;">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control input-search"
                            placeholder="Cari Game Disini">
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 1rem;">
                <div class="row">
                    <div class="menu">
                        <div class="wrapper">
                            <div class="carousel">
                                @foreach ($providers as $provider)
                                    <div onclick="show_data('filter', {{ $provider->id }})" style="cursor: pointer;">
                                        <center>
                                            <img src="https://classbet97x.space/idn/assets/img/icon/provider/new/{{ $provider->short_name }}.svg"
                                                style="height: 80px; width: 80px;">
                                            <h6 style="font-size: 12px; color: #DBC401;" class="text-gradient">{{ $provider->short_name }}
                                            </h6>
                                        </center>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 30px; width: 100%;">
            <div class="menu" style="float: left;">
                <ul>
                    <li>
                        <a href="javascript:void(0)" onclick="show_data('', 0)" class="text-gradient">
                            <i class='bx bx-stats'></i>
                            <span class="text-nowrap">Semua</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="show_data('new', 0)">
                            <i class='bx bx-football'></i>
                            Terbaru
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="show_data('populer', 0)">
                            <i class='bx bx-book-content'></i>
                            <span class="text-nowrap">Terpopuler</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12">
            <div class="row" id="slot_leaks">
                <div class="col-12 text-center mb-3 more_live_rtp_con">
                    <button class="btn btn-secondary more_live_rtp" data-limit="24">Lebih Banyak</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12" style="text-align: center;">
                <p>
                <p>RTP: Return to Player, Panduan Singkat untuk Pemain Judi Online</p>
                <p>
                    <br>
                </p>
                <p>RTP atau Return to Player adalah istilah yang sering ditemui dalam industri perjudian online. Konsep
                    ini penting untuk dipahami oleh para pemain karena dapat memengaruhi peluang menang dan keuntungan
                    dalam permainan kasino online.</p>
                <p>
                    <br>
                </p>
                <p>RTP adalah persentase dari total taruhan yang dimainkan dalam permainan kasino yang secara teoritis
                    dikembalikan kepada pemain sebagai kemenangan dalam jangka waktu tertentu. Misalnya, jika RTP suatu
                    permainan adalah 95%, ini berarti bahwa dari setiap 100 unit yang dipertaruhkan, pemain dapat
                    mengharapkan kembali 95 unit sebagai kemenangan. Sisanya, 5 unit, merupakan keuntungan kasino.</p>
                <p>
                    <br>
                </p>
                <p>RTP dihitung dengan mempertimbangkan berbagai faktor, termasuk peluang munculnya kombinasi pemenang
                    dalam permainan dan pembayaran untuk kombinasi tersebut. Formula umum untuk menghitung RTP adalah:
                    RTP = (Total Kemenangan / Total Taruhan).</p>
                </p>
            </div>
        </div>
        <hr>
        <footer>
            <div class="container" style="padding-bottom: 20px;">
                <div class="col-12 text-center">
                    <span>
                        <i class='bx bx-copyright'></i>
                        2021 - {{ now()->format('Y') }} {{ config('app.name') }}
                    </span>
                </div>
            </div>
        </footer>
        <div class="back-top" style="display:none;" id="back-top">
            <button type="button" class="btn btn-secondary" onclick="topFunction()">
                <i class='bx bx-chevron-up'></i>
            </button>
        </div>
    </div>
    <div id="popup-container-ads" class="popup-container">
        <div id="popup-body" class="popup-body popup-container-ads"
            style="background: url(/storage/{{ config('app.desktop_logo') }}); background-repeat: no-repeat; background-size: 100%;">
            <div class="popup-close" onclick="close_popup()">
                <center>
                    <b>x</b>
                </center>
            </div>
            <a href="{{ config('app.url') }}">
                <div id="popup-header" style="background: none; height: 100%;" class="popup-header">
                    <center>
                        <h6>
                            <b>
                                <label class="title-popup"></label>
                            </b>
                        </h6>
                    </center>
                </div>
            </a>
        </div>
    </div>
    <div id="popup-container-ads-yt" class="popup-container" style="z-index: 20000;">
        <div id="popup-body" class="popup-body popup-body-ads-yt">
            <div class="popup-close" onclick="close_popup_ads_yt()">
                <center>
                    <b>x</b>
                </center>
            </div>
            <iframe width="200" height="200" sandbox="allow-scripts allow-same-origin allow-presentation"
                frameborder="0" src="https://www.youtube.com/embed/W510e4EXiIQ?si=U66h0Lq48WL9_heZ">
                <img src="{{ config('app.url') }}/storage/{{ config('app.desktop_logo') }}" placeholder></img>
            </iframe>
        </div>
    </div>
    <div id="popup-container-bad" class="popup-container">
        <div id="popup-body" class="popup-body" style="height: 394px;">
            <div class="popup-close" onclick="close_popup()">
                <center>
                    <b>x</b>
                </center>
            </div>
            <center>
                <img style="margin: 60px; width: 137px;" src="{{ config('app.cdn') . '/idn/rtp/sad.png' }}">
                <p style="margin: -12px 40px;">
                    <label class="title-popup" id="nama-slot-bad">CQ9</label>
                    <br>
                    <span id="pesan-slot-bad">RTP Slot Ini Sedang Rendah, Silahkan Untuk Memilih Slot Dengan RTP Yang
                        Tinggi.</span>
                </p>
            </center>
        </div>
    </div>
    <div id="popup-container-win" class="popup-container">
        <div id="popup-body" class="popup-body">
            <div class="popup-close" onclick="close_popup()">
                <center>
                    <b>x</b>
                </center>
            </div>
            <div id="popup-header" class="popup-header">
                <center>
                    <h6 id="title-popup-win">
                        <b>Tips Bermain</b>
                    </h6>
                </center>
            </div>
            <div style="overflow-y: scroll;height: 85%;width: 100%;">
                <div id="pop-content-detail-game" class="popup-content">
                    <div class="row">
                        <div class="col2 left">Provider</div>
                        <div class="col2 right" id="provider">
                            <b>
                                <label style="margin-bottom: 0px;" class="title-popup">CQ9</label>
                            </b>
                        </div>
                        <div class="hr"></div>
                    </div>
                    <div class="row">
                        <div class="col2 left">Slot Game</div>
                        <div class="col2 right" id="game_slot">
                            <b>
                                <label style="margin-bottom: 0px;" class="title-popup">CQ9</label>
                            </b>
                        </div>
                        <div class="hr"></div>
                    </div>
                    <div class="row mrtop10">
                        <div class="col2 left">Stake Bet</div>
                        <div class="col2 right" id="stake_bet">
                            <b>600 - 10K</b>
                        </div>
                        <div class="hr"></div>
                    </div>
                </div>
                <div>
                    <div class="popup-label">
                        <center>
                            <b>PAKAI POLA KHUSUS {{ config('app.name') }}
                                </label></b>
                        </center>
                    </div>
                </div>
                <div id="popup-tips-body" class="popup-content"></div>
                <div>
                    <div class="popup-label" style="background: #f6c700; color: black; padding: 0px 0px;">
                        <!-- Slideshow container -->
                        <div class="slideshow-containerText">
                            <!-- Full-width slides/quotes -->
                            <div class="mySlidesText">
                                <p class="sliderTextTitle">
                                    <b>TIPS 1</b>
                                </p>
                                <p>
                                    Lakukan Pola Dari Awal & Ulangi Jika Salah<br>(Nyalakan Double Change Jika Ada)

                                </p>
                            </div>
                            <div class="mySlidesText">
                                <p class="sliderTextTitle">
                                    <b>TIPS 2</b>
                                </p>
                                <p>
                                    Jika Sudah Mengalami Kekalahan Beruntun<br>Istirahat 15 Menit & Lanjutkan Lagi

                                </p>
                            </div>
                            <div class="mySlidesText">
                                <p class="sliderTextTitle">
                                    <b>TIPS 3</b>
                                </p>
                                <p>
                                    Selau Ikuti Pola Dari Kami<br>Untuk Mendapatkan Hasil Terbaik

                                </p>
                            </div>
                            <!-- Next/prev buttons -->
                            <a class="prevText" onclick="plusSlidesText(-1)">&#10094;</a>
                            <a class="nextText" onclick="plusSlidesText(1)">&#10095;</a>
                        </div>
                    </div>
                </div>
                <div class="popup-content" style="padding: 10px 39px;">
                    <div class="row" style="color: #999999;" id="description">
                        <h6 style="margin-bottom: 4px; color: white;">
                            <b>Note:</b>
                        </h6>
                        JIKA TERSEDIA / INGIN MEMBELI FITUR SPIN LAKUKAN POLA DIATAS SEBANYAK 2X
                    </div>
                </div>
            </div>
            <input type="hidden" name="slot_leak_id" value="{{ csrf_token() }}">
            <div>
                <a href="{{ config('app.url') }}/register" class="popip-button bg-black-button">
                    <center>
                        <h6 style="margin-bottom: 4px; color: white; padding: 10px;">DAFTAR</h6>
                    </center>
                </a>
                <a target="_blank" href="{{ config('app.url') }}" class="popip-button bg-blue-button"
                    id="play-btn">
                    <center>
                        <h6 style="margin-bottom: 4px; color: white; padding: 10px;">MAIN</h6>
                    </center>
                </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://classbet97x.space/idn/rtp/assets/js/bootstrap.min.js"></script>
    <script src="https://classbet97x.space/idn/rtp/assets/js/main.js"></script>
    <script src="https://classbet97x.space/idn/rtp/assets/js/javascript.js"></script>
    {{-- <script id="MetaTags" type="application/ld+json">{"@context": "https://schema.org","@type": "SoftwareApplication","name": "Bocoran Admin Slot Gacor Hari Ini | RTP Live Bocoran {{ config('app.name') }}","operatingSystem": "All Platform","applicationCategory": "LifestyleApplication","image": "{{ config('app.url') }}/storage/{{ config('app.desktop_logo') }}","contentRating": "9721837","author": {"@type": "Person","name": "Bocoran Admin Slot Gacor Hari Ini | RTP Live Bocoran {{ config('app.name') }}","url": "{{ config('app.url') }}"},"aggregateRating": {"@type": "AggregateRating","ratingValue": "4.9547","ratingCount": "90214"},"offers": {"@type": "Offer","price": "0","priceCurrency": "IDR","availability": "https://schema.org/InStock"}}</script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js"></script>
    <script>
        var base_url = "{{ config('app.url') }}";
        var providers = [@foreach ($providers as $provider){"id": "{{ $provider->id }}", "image": "https://classbet97x.space/idn/assets/img/icon/provider/new/{{ $provider->short_name }}.svg", "name": "{{ $provider->name }}", "abbreviation": "{{ $provider->code }}", "stake_bet": "BEBAS", "spin_normal": "15, 25, 35, 45, 55", "spin_fast": "10, 20, 30, 40, 50", "spin_catch": "3, 5, 7, 9", "spin_turbo": "20, 30, 40, 50, 60, 70", "tips_title_1": "TIPS 1", "tips_content_1": "Lakukan Pola Dari Awal & Ulangi Jika Salah (Nyalakan Double Change Jika Ada)", "tips_title_2": "TIPS 2", "tips_content_2": "Jika Sudah Mengalami Kekalahan Beruntun Istirahat 15 Menit & Lanjutkan Lagi", "tips_title_3": "TIPS 3", "tips_content_3": "Selau Ikuti Pola Dari Kami Untuk Mendapatkan Hasil Terbaik", "tips_title_4": "TIPS 4", "tips_content_4": "Jangan buyspin jika pecahan di pola sebelumnya lebih sedikit daripada kekosongan, lebih baik langsung spam auto turbo 30x.", "tips_title_5": "", "tips_content_5": "", "description": "<p><strong>Note:<\/strong><\/p><p>JIKA TERSEDIA \/ INGIN MEMBELI FITUR SPIN LAKUKAN POLA DIATAS SEBANYAK 2X<\/p>", "is_active": "1", "created_at": "2022-06-08 12:35:54", "updated_at": "2024-05-01 17:41:41", "is_deleted": "0"},@endforeach];
        var slot_leaks = [@foreach ($games as $game){"id": "{{ $game->id }}", "provider_id": "{{ $game->provider_id }}", "image": "{{ Str::isUrl($game->banner) ? $game->banner : config('app.cdn') . '/nexus/images/games/' . $game->banner }}", "name": "{{ $game->name }}", "demo": null, "minimum_rtp": "50", "description": "{{ $game->name }}", "popularity": "{{ $game->id }}", "is_active": "1", "created_at": "{{ $game->created_at }}", "updated_at": "{{ $game->updated_at }}", "is_deleted": "0", "provider": "{{ $game->provider->name }}", "image_provider": "https://classbet97x.space/idn/assets/img/icon/provider/new/{{ $game->provider->short_name }}.svg", "abbreviation": "{{ $game->provider->code }}", "stake_bet": "BEBAS", "spin_normal": "15, 25, 35, 45, 55", "spin_fast": "10, 20, 30, 40, 50", "spin_catch": "3, 5, 7, 9", "spin_turbo": "20, 30, 40, 50, 60, 70", "provider_description": "<p><strong>Note:<\/strong><\/p><p>JIKA TERSEDIA \/ INGIN MEMBELI FITUR SPIN LAKUKAN POLA DIATAS SEBANYAK 2X<\/p>", "tips_title_1": "TIPS 1", "tips_content_1": "Lakukan Pola Dari Awal & Ulangi Jika Salah (Nyalakan Double Change Jika Ada)", "tips_title_2": "TIPS 2", "tips_content_2": "Jika Sudah Mengalami Kekalahan Beruntun Istirahat 15 Menit & Lanjutkan Lagi", "tips_title_3": "TIPS 3", "tips_content_3": "Selau Ikuti Pola Dari Kami Untuk Mendapatkan Hasil Terbaik", "tips_title_4": "TIPS 4", "tips_content_4": "Jangan lakukan buy jika pecahan lebih sedikit daripada kekosongan", "tips_title_5": "", "tips_content_5": ""},@endforeach];
        var slot_leaks_new = ["12638", "12637", "12634", "12635", "12636", "2011", "2010", "2009", "2006", "2005", "2004","2002"];
        var slot_leaks_recent = [];
        var slot_leaks_populer = ["2373", "2596", "2597", "2236", "12634", "2421", "12637", "12638", "2649", "2422", "2239", "2645", "2593", "2319", "2407", "2440", "2514", "2501", "2320", "2583", "2408", "2437", "12636", "2439", "2611", "2010", "2585", "2235", "2515", "2527", "2416", "2429"];
        var filter = slot_leaks[0]['provider_id'];
        var pagination_type, pagination_value, pagination_length = 20;

        $(document).ready(function() {
            $(".input-search").keyup(function() {
                show_data('search', this.value);
            });

            $(".input-search").change(function() {
                if (this.value == '') {
                    show_data('filter', filter);
                }
            });

            $('.navigsi-besar').click(function() {
                $('.navigsi-besar').removeClass('active');
                this.classList.add('active');
            });

            $('input[name=filter]').click(function() {
                $('#popup-container-filter').fadeIn(500);
            });

            $(".btn-nav-recent").click(function() {
                $(".active").removeClass('active');

                show_data('recent', 0);
            });

            $(".btn-nav-hot").click(function() {
                $(".active").removeClass('active');

                show_data('populer', 0);
            });

            $(".btn-nav-new").click(function() {
                $(".active").removeClass('active');

                show_data('new', 0);
            });

            $('#play-btn').click(function() {
                $.ajax({
                    url: "{{ config('app.url') }}/website/set_populer/" + $(
                        'input[name=slot_leak_id]').val(),
                    success: function(result) {
                        $("#div1").html(result);
                    }
                });
            });

            $(document.body).on('touchmove', onScroll);
            $(window).on('scroll', onScroll);
        });

        function onScroll() {
            if ($(window).scrollTop() + window.innerHeight >= document.body.scrollHeight) {
                next_pages();
            }
        }

        function next_pages() {
            pagination_length = pagination_length * 2;
            show_data(pagination_type, pagination_value);
        }

        show_data('populer', 0);
        function show_data_filter_mobile(type, value) {
            close_popup();
            show_data(type, value);
        }

        function show_data(type, value) {
            if (type != pagination_type || value != pagination_value) {
                pagination_length = 20;
            }

            pagination_type = type;
            pagination_value = value;

            if (type == 'filter') {
                filter = value;
                $("input[name=search]").val("");
            }
            $("#slot_leaks").html('');

            var data_slot_leaks = [];
            for (let i = 0; i < slot_leaks.length; i++) {
                if ((type == 'filter' || type == 'first') && value != slot_leaks[i]['provider_id'])
                    continue;
                if (type == 'search' && !slot_leaks[i]['name'].replace('-', ' ').toUpperCase().includes(value
                        .toUpperCase()))
                    continue;
                if (type == 'new' && slot_leaks_new.indexOf(slot_leaks[i]['id']) == -1)
                    continue;
                if (type == 'recent' && slot_leaks_recent.indexOf(slot_leaks[i]['id']) == -1)
                    continue;
                if (type == 'populer' && slot_leaks_populer.indexOf(slot_leaks[i]['id']) == -1)
                    continue;

                data_slot_leaks.push(slot_leaks[i]);
            }

            for (let i = 0; i < pagination_length && i < data_slot_leaks.length; i++) {
                var lastTime = localStorage.getItem("lastTime_" + data_slot_leaks[i]['id']);
                var currentTime = new Date().getTime();

                if (!lastTime || (currentTime - lastTime) >= 1200000) {
                    const d = new Date();
                    var date = d.getUTCDate();
                    var day = d.getUTCDay() + 1;
                    var year = d.getUTCFullYear();
                    var month = d.getUTCMonth() + 1;
                    var hour = d.getUTCHours();
                    var min = d.getMinutes() % 2;

                    var xx = day + year * month * date;
                    xx = Math.pow(xx, hour * min);
                    xx = xx * data_slot_leaks[i]['id'];

                    if (i == 44 || i == 35 || i == 48 || i == 74 || i == 105 || i == 41 || i == 69) {
                        xx = xx % 27;
                        xx += 65;
                    } else {
                        xx = xx % 83;
                        xx += 8;
                    }
                    if (xx == NaN || xx == "NaN") {
                        xx = Math.floor(Math.random() * 99);
                    }

                    if (xx < parseInt(data_slot_leaks[i]['minimum_rtp']))
                        xx = ((Math.floor(Math.random() * 99) % parseInt(data_slot_leaks[i]['minimum_rtp'])) + parseInt(
                            data_slot_leaks[i]['minimum_rtp']));
                    if (xx > 99)
                        xx = xx - (xx - 99);

                    localStorage.setItem("lastTime_" + data_slot_leaks[i]['id'], currentTime);
                    localStorage.setItem("xx_" + data_slot_leaks[i]['id'], xx);
                    var random_val_1 = data_slot_leaks[i]['spin_normal'].split(',').map(Number);
                    var random_1 = random_val_1[Math.floor(Math.random() * random_val_1.length)];
                    localStorage.setItem("random_1_xx_" + xx + "_" + data_slot_leaks[i]['id'], random_1);
                    var random_val_2 = data_slot_leaks[i]['spin_fast'].split(',').map(Number);
                    var random_2 = random_val_2[Math.floor(Math.random() * random_val_2.length)];
                    localStorage.setItem("random_2_xx_" + xx + "_" + data_slot_leaks[i]['id'], random_2);
                    var random_val_3 = data_slot_leaks[i]['spin_catch'].split(',').map(Number);
                    var random_3 = random_val_3[Math.floor(Math.random() * random_val_3.length)];
                    localStorage.setItem("random_3_xx_" + xx + "_" + data_slot_leaks[i]['id'], random_3);
                    var random_val_4 = data_slot_leaks[i]['spin_turbo'].split(',').map(Number);
                    var random_4 = random_val_4[Math.floor(Math.random() * random_val_4.length)];
                    localStorage.setItem("random_4_xx_" + xx + "_" + data_slot_leaks[i]['id'], random_4);
                } else {
                    var xx = parseInt(localStorage.getItem("xx_" + data_slot_leaks[i]['id']));

                    var random_1 = localStorage.getItem("random_1_xx_" + xx + "_" + data_slot_leaks[i]['id']);
                    var random_2 = localStorage.getItem("random_2_xx_" + xx + "_" + data_slot_leaks[i]['id']);
                    var random_3 = localStorage.getItem("random_3_xx_" + xx + "_" + data_slot_leaks[i]['id']);
                    var random_4 = localStorage.getItem("random_4_xx_" + xx + "_" + data_slot_leaks[i]['id']);
                }
                var color_bar = ((xx < 30) ? 'red' : (xx < 70) ? 'yellow' : 'green');
                var datastr = '<div class="col-6 col-md-3 col-xl-2 slot-cont">' + '<div class="slot-container">' + '<div class="slot-image">' + '<img style="max-height: 100%;" src="' + data_slot_leaks[i]['image'] + '">' + '</div>' + '<div class="slot-title">' + '<div class="text-secondary">' + data_slot_leaks[i]['provider'] + '</div>' + '</div>' + '<div class="slot-stats">' + '<div class="stats-title">' + '<i class="bx bx-stats"></i> Statistik RTP' + '</div>' + '<div class="stats-list text-gradient">' + '<div>RTP Live</div>' + '<div>' + xx + '%</div>' + '</div>' + '<div class="stats-list text-secondary">' + '<div>Mingguan</div>' + '<div>' + Math.floor((parseInt((99 + 99 + 99 + xx + xx + xx)) / 6)) + '%</div>' + '</div>' + '</div>' + '<div class="slot-btn">' + '<a href="javascript:void(0)" onclick="show_popup(\'' + (JSON.stringify(data_slot_leaks[i]).replaceAll('"', '`')) + '\', \'' + xx + '\', \'' + random_1 + '\', \'' + random_2 + '\', \'' + random_3 + '\', \'' + random_4 + '\')" class="btn btn-primary w-100">Pola Main</a>' + '</div>' + '</div>' + '</div>';
                $("#slot_leaks").append(datastr);
            }
        }
        $(document).ready(function() {
            $('.carousel').slick({
                variableWidth: true,
                slidesToShow: 8,
                dots: false,
                centerMode: false,
            });
        });
    </script>
</body>

</html>
