<x-desktop.layout>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 content-all">
                <div id="content">
                    <div class="slots-bg-container-popular">
                        <img src="">
                    </div>
                    <div class="game-title-wrapper">
                        <div class="category-title">
                            <h1>{{ config('app.name') . ' | ' . config('app.title') }}</h1>
                        </div>
                    </div>
                    <section id="slots">
                        <div class="col-sm-3 slot-sidebar">
                            <ul class="nav menu slot-sidebar-nav">
                                <li>
                                    <div class="search-input">
                                        <input type="text" class="form-control" placeholder="Cari game"
                                            id="search" onkeyup="gameSearch(this)" />
                                    </div>
                                </li>
                                <li>
                                    <a class="btn-provider popular-bg active"
                                        href="/arcadeGames" id="sortCategory"
                                        data-sort="popular" data-id="popular" data-logo="popular">
                                        <i class="icon-popular"></i> Game Populer
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider"
                                        href="/arcadegames"
                                        id="sortCategory" data-id = "149" data-logo = "idnrng" disabled="">
                                        <i class="svg-idnrng"></i>IDNARCADE
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider"
                                        href="/arcadegames"
                                        id="sortCategory" data-id = "153" data-logo = "idntrade" disabled="">
                                        <i class="svg-idntrade"></i>IDNTRADE
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider"
                                        href="/arcadegames"
                                        id="sortCategory" data-id = "146" data-logo = "kongoriginal" disabled="">
                                        <i class="svg-kongoriginal"></i>KONG
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider"
                                        href="/arcadegames"
                                        id="sortCategory" data-id = "147" data-logo = "pragmatic" disabled="">
                                        <i class="svg-pragmatic"></i>PP
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider"
                                        href="/arcadegames"
                                        id="sortCategory" data-id = "148" data-logo = "mg" disabled="">
                                        <i class="svg-mg"></i>MG
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider"
                                        href="/arcadegames" id="sortCategory"
                                        data-id = "152" data-logo = "spade" disabled="">
                                        <i class="svg-spade"></i>SG
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-provider" href="/arcadegames"
                                        id="sortCategory" data-sort="new" data-id="new" data-logo="new">
                                        <i class="icon-new"></i> Game Baru
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="horizontal-list-wrapper">
                                <div class="game-one-half-slot slots-games">
                                    <div class="game-box-slots">
                                        <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                            data-backdrop="static" data-keyboard="false">
                                            <div class="slot-hover-buttons">
                                                <div class="slot-play-button">Play</div>
                                            </div>
                                            <div class="slots-img-wrap">
                                                <div class="badge-game pragmatic"><i></i></div>
                                                <img class="responsive-image lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                                    data-original="https://classbet97x.space/idn/assets/img/slot-mania.webp"
                                                    alt="SLOT MANIA HIGH FLYER?v=8.9">
                                            </div>
                                            <div class="clear"></div>
                                            <div class="ribbon-baru">
                                                <img class="lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                                    data-original="https://classbet97x.space/idn/assets/img/Baru.webp"
                                                    alt="new-ribbon" />
                                            </div>
                                            <div class="game-title-slots" style="font-size: 10px; "><b>Slot Mania High
                                                    Flyer</b>
                                            </div>
                                    </div>
                                </div>
                                <div class="game-one-half-slot slots-games">
                                    <div class="game-box-slots">
                                        <a class="login-modal" href="#" data-toggle="modal"
                                            data-target="#login" data-backdrop="static" data-keyboard="false">
                                            <div class="slot-hover-buttons">
                                                <div class="slot-play-button-arcade">
                                                    <div class="slot-play-button-arcade-real">
                                                        <img class="lazyload"
                                                            src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                                            data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                                            alt="play-real" /> Play
                                                    </div>
                                        </a>
                                    </div>
                                    <div class="slot-play-button-arcade">
                                        <a class="login-modal" href="#" data-toggle="modal"
                                            data-target="#login" data-backdrop="static" data-keyboard="false">
                                    </div>
                                </div>
                                <div class="slots-img-wrap">
                                    <div class="badge-game idnrng"><i></i></div>
                                    <img class="responsive-image lazyload"
                                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                        data-original="https://classbet97x.space/idn/assets/img/plinkball.webp"
                                        alt="PLINKO PINBALL?v=8.9">
                                </div>
                                <div class="clear"></div>
                                <div class="ribbon-baru">
                                    <img class="lazyload"
                                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                        data-original="https://classbet97x.space/idn/assets/img/Baru.webp"
                                        alt="new-ribbon" />
                                </div>
                                <div class="game-title-slots" style="font-size: 10px; "><b>Plinko Pinball</b>
                                </div>
                            </div>
                        </div>
                        <div class="game-one-half-slot slots-games">
                            <div class="game-box-slots">
                                <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                    data-backdrop="static" data-keyboard="false">
                                    <div class="slot-hover-buttons">
                                        <div class="slot-play-button">Play</div>
                                    </div>
                                    <div class="slots-img-wrap">
                                        <div class="badge-game pragmatic"><i></i></div>
                                        <img class="responsive-image lazyload"
                                            src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/pragmatic-direct/Spaceman1.webp?v=8.9"
                                            alt="SPACEMAN?v=8.9">
                                    </div>
                                    <div class="clear"></div>
                                    <div class="game-title-slots" style="font-size: 10px; "><b>Spaceman</b>
                                    </div>
                            </div>
                        </div>
                        <div class="game-one-half-slot slots-games">
                            <div class="game-box-slots">
                                <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                    data-backdrop="static" data-keyboard="false">
                                    <div class="slot-hover-buttons">
                                        <div class="slot-play-button">Play</div>
                                    </div>
                                    <div class="slots-img-wrap">
                                        <div class="badge-game kongoriginal"><i></i></div>
                                        <img class="responsive-image lazyload"
                                            src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Plinko.webp?v=8.9"
                                            alt="PLINKO?v=8.9">
                                    </div>
                                    <div class="clear"></div>
                                    <div class="game-title-slots" style="font-size: 10px; "><b>Plinko</b>
                                    </div>
                            </div>
                        </div>
                        <div class="game-one-half-slot slots-games">
                            <div class="game-box-slots">
                                <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                    data-backdrop="static" data-keyboard="false">
                                    <div class="slot-hover-buttons">
                                        <div class="slot-play-button">Play</div>
                                    </div>
                                    <div class="slots-img-wrap">
                                        <div class="badge-game pragmatic"><i></i></div>
                                        <img class="responsive-image lazyload"
                                            src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/pragmatic-direct/Big Bass Crash.webp?v=8.9"
                                            alt="BIG BASS CRASH?v=8.9">
                                    </div>
                                    <div class="clear"></div>
                                    <div class="game-title-slots" style="font-size: 10px; "><b>Big Bass Crash</b>
                                    </div>
                            </div>
                        </div>
                        <div class="game-one-half-slot slots-games">
                            <div class="game-box-slots">
                                <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                    data-backdrop="static" data-keyboard="false">
                                    <div class="slot-hover-buttons" style="padding-top: 30px;">
                                        <div class="slot-play-button-arcade">
                                            <div class="slot-play-button-arcade-real">
                                                <img class="lazyload"
                                                    src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                                    data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                                    alt="play-real" /> Play
                                            </div>
                                </a>
                            </div>
                            <div class="slot-play-button-arcade">
                                <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                                    data-backdrop="static" data-keyboard="false">
                            </div>
                        </div>
                        <div class="slots-img-wrap">
                            <div class="badge-game idnrng"><i></i></div>
                            <img class="responsive-image lazyload"
                                src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                                data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/idnseamless-idnrng/Roulette new.webp?v=8.9"
                                alt="ROULETTE?v=8.9">
                        </div>
                        <div class="clear"></div>
                        <div class="game-title-slots" style="font-size: 10px; "><b>Roulette</b>
                        </div>
                </div>
            </div>
            <div class="game-one-half-slot slots-games">
                <div class="game-box-slots">
                    <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                        data-backdrop="static" data-keyboard="false">
                        <div class="slot-hover-buttons">
                            <div class="slot-play-button-arcade">
                                <div class="slot-play-button-arcade-real">
                                    <img class="lazyload"
                                        src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                        data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                        alt="play-real" /> Play
                                </div>
                    </a>
                </div>
                <div class="slot-play-button-arcade">
                    <a class="login-modal" href="#" data-toggle="modal" data-target="#login"
                        data-backdrop="static" data-keyboard="false">
                </div>
            </div>
            <div class="slots-img-wrap">
                <div class="badge-game idnrng"><i></i></div>
                <img class="responsive-image lazyload"
                    src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                    data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/idnseamless-idnrng/Plinko new.webp?v=8.9"
                    alt="PLINKO?v=8.9">
            </div>
            <div class="clear"></div>
            <div class="game-title-slots" style="font-size: 10px; "><b>Plinko</b>
            </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game kongoriginal"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Goal.webp?v=8.9"
                        alt="GOAL?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Goal</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game kongoriginal"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Mine.webp?v=8.9"
                        alt="MINE?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Mine</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game microgaming"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/microgaming-direct/SoccerStriker-ezgif.com-optiwebp.webp?v=8.9"
                        alt="SOCCER STRIKER?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Soccer Striker</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game spadegaming"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/spadegaming/Space Crasher.webp?v=8.9"
                        alt="SPACE CRASHER?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="ribbon-baru">
                    <img class="lazyload" src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://classbet97x.space/idn/assets/img/Baru.webp" alt="new-ribbon" />
                </div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Space Crasher</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons" style="padding-top: 30px;">
                    <div class="slot-play-button-arcade">
                        <div class="slot-play-button-arcade-real">
                            <img class="lazyload" src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                alt="play-real" /> Play
                        </div>
            </a>
        </div>
        <div class="slot-play-button-arcade">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
        </div>
    </div>
    <div class="slots-img-wrap">
        <div class="badge-game idnrng"><i></i></div>
        <img class="responsive-image lazyload" src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/idnseamless-idnrng/Baccarat new.webp?v=8.9"
            alt="BACCARAT?v=8.9">
    </div>
    <div class="clear"></div>
    <div class="game-title-slots" style="font-size: 10px; "><b>Baccarat</b>
    </div>
    </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button-arcade">
                        <div class="slot-play-button-arcade-real">
                            <img class="lazyload" src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                alt="play-real" /> Play
                        </div>
            </a>
        </div>
        <div class="slot-play-button-arcade">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
        </div>
    </div>
    <div class="slots-img-wrap">
        <div class="badge-game idnrng"><i></i></div>
        <img class="responsive-image lazyload" src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/idnseamless-idnrng/ShogunEmpire-ezgif.com-optiwebp.webp?v=8.9"
            alt="SHOGUN EMPIRE?v=8.9">
    </div>
    <div class="clear"></div>
    <div class="ribbon-baru">
        <img class="lazyload" src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
            data-original="https://classbet97x.space/idn/assets/img/Baru.webp" alt="new-ribbon" />
    </div>
    <div class="game-title-slots" style="font-size: 10px; "><b>Shogun Empire</b>
    </div>
    </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game kongoriginal"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Limbo-ezgif.com-optiwebp.webp?v=8.9"
                        alt="LIMBO?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Limbo</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game kongoriginal"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Lucky Beer.webp?v=8.9"
                        alt="LUCKY BEER?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Lucky Beer</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game microgaming"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/microgaming-direct/Fruit-Blast.webp?v=8.9"
                        alt="FRUIT BLAST?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Fruit Blast</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button-arcade">
                        <div class="slot-play-button-arcade-real">
                            <img class="lazyload" src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                alt="play-real" /> Play
                        </div>
            </a>
        </div>
        <div class="slot-play-button-arcade">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
        </div>
    </div>
    <div class="slots-img-wrap">
        <div class="badge-game idnrng"><i></i></div>
        <img class="responsive-image lazyload" src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/idnseamless-idnrng/Dragon Portal new.webp?v=8.9"
            alt="DRAGON PORTAL ?v=8.9">
    </div>
    <div class="clear"></div>
    <div class="game-title-slots" style="font-size: 10px; "><b>Dragon Portal </b>
    </div>
    </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game microgaming"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/microgaming-direct/Monster Blast.webp?v=8.9"
                        alt="MONSTER BLAST?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Monster Blast</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game microgaming"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/microgaming-direct/Incan Adventure-min.webp?v=8.9"
                        alt="INCAN ADVENTURE?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Incan Adventure</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons" style="padding-top: 30px;">
                    <div class="slot-play-button-arcade">
                        <div class="slot-play-button-arcade-real">
                            <img class="lazyload" src="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                data-original="https://classbet97x.space/idn/assets/img/icon/icon_play.png"
                                alt="play-real" /> Play
                        </div>
            </a>
        </div>
        <div class="slot-play-button-arcade">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
        </div>
    </div>
    <div class="slots-img-wrap">
        <div class="badge-game idnrng"><i></i></div>
        <img class="responsive-image lazyload" src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
            data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/idnseamless-idnrng/Roulette Multiplier new.webp?v=8.9"
            alt="MULTIPLAYER ROULETTE?v=8.9">
    </div>
    <div class="clear"></div>
    <div class="game-title-slots" style="font-size: 10px; "><b>Multiplayer Roulette</b>
    </div>
    </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game kongoriginal"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Wheel.webp?v=8.9"
                        alt="WHEEL?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Wheel</b>
                </div>
        </div>
    </div>
    <div class="game-one-half-slot slots-games">
        <div class="game-box-slots">
            <a class="login-modal" href="#" data-toggle="modal" data-target="#login" data-backdrop="static"
                data-keyboard="false">
                <div class="slot-hover-buttons">
                    <div class="slot-play-button">Play</div>
                </div>
                <div class="slots-img-wrap">
                    <div class="badge-game kongoriginal"><i></i></div>
                    <img class="responsive-image lazyload"
                        src="https://classbet97x.space/idn/assets/img/game-slot-holder.webp"
                        data-original="https://media.fastchecker.us/idnsmedia/is/slots-v3/kongoriginal/Monster Dice.webp?v=8.9"
                        alt="MONSTER DICE?v=8.9">
                </div>
                <div class="clear"></div>
                <div class="game-title-slots" style="font-size: 10px; "><b>Monster Dice</b></div>
        </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    </div>
    </div>
    </div>
</x-desktop.layout>
