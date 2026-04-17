<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ config('app.name') . ' | ' . config('app.title') }}</title>
    <x-meta.seo />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/storage/{{ config('app.favicon') }}" type="image/x-icon">
    <link rel="preconnect" href="https://classbet97x.space">
    <link rel="preload" href="https://classbet97x.space/assets/css/fontawesome/all.min.css" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://classbet97x.space/idn/assets/css/desktop/{{ Str::replace('.', '-', Str::lower(Route::currentRouteName())) }}.css" as="style" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/assets/css/fontawesome/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/css/desktop/{{ Str::replace('.', '-', Str::lower(Route::currentRouteName())) }}.css" crossorigin="anonymous">
</head>

<body>
    <div class="clear">
        <img src="/storage/{{ config('app.desktop_logo') }}" alt="{{ config('app.name') . ' | ' . config('app.title') }}">
    </div>
    <div class="navbox clearfix">
        <div class="pull-right">
        </div>
        <ul>
            <li class="{{ request()->is('transaction/history') ? 'current' : '' }}" onclick="location.href='/transaction/history'"><span>Histori Transaksi</span></li>
            <li class="{{ request()->is('bonus/history') ? 'current' : '' }}" onclick="location.href='/bonus/history'"><span>Histori Bonus</span></li>
            <li class="{{ request()->is('memo') ? 'current' : '' }}" onclick="location.href='/memo'"><span>Memo</span></li>
            <li class="{{ request()->is('referral') ? 'current' : '' }}" onclick="location.href='/referral'"><span>Referral</span></li>
        </ul>
    </div>
    {{ $slot }}
    <div class="modal fade" id="loading-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="spinner-parlay spinner-initial-parlay" style="display: none;"></div>
    </div>
    <div class="modal fade" id="incompleteGameModal" tabindex="-1" role="dialog"
        aria-labelledby="incompleteGameLabel">
        <div class="modal-dialog login-dialog" role="document">
            <div class="modal-content alert alert-warning">
                <div class="modal-body" style="padding: 0px">
                    <div class="" style="margin-top:15px" id="popup-message-error">
                        <div style="text-align: center;">
                            <h4>Unfinished Game</h4>
                        </div>
                        <div style="text-align: center;">Whoops! It seems that you have a running game going before you
                            disconnected.</div>
                        <div style="text-align: center;">Please click on this link to complete the unfinished game.
                        </div>
                        <div style="text-align: center;">
                            <a href="" target="_blank" id="incomplete-game-url"> >> Click Here << </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://classbet97x.space/idn/assets/js/desktop/auth/{{ Str::replace('.', '-', Str::lower(Route::currentRouteName())) }}.js" crossorigin="anonymous"></script>
</body>

</html>
