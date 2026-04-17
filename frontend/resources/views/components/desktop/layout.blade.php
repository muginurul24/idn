<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff">
    <title>{{ config('app.name') . ' | ' . config('app.title') }}</title>
    <x-meta.seo />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/storage/{{ config('app.favicon') }}" type="image/x-icon">
    <link rel="preconnect" href="https://classbet97x.space">
    @if ($g_analytic)
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preload" href="https://www.googletagmanager.com/gtag/js?id=G-{{ $g_analytic }}" as="script">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-{{ $g_analytic }}"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag("js",new Date);gtag("config","G-{{ $g_analytic }}");</script>
    @elseif ($g_tag)
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preload" href="https://www.googletagmanager.com/gtag/js?id=G-{{ $g_tag }}" as="script">
    <script async src="https://www.googletagmanager.com/gtag/js?id=GT-{{ $g_tag }}"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag("js",new Date);gtag("config","G-{{ $g_tag }}");</script>
    @endif
    <link rel="preload" href="https://classbet97x.space/assets/css/fontawesome/all.min.css" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://classbet97x.space/idn/assets/css/desktop/style.css" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://classbet97x.space/idn/assets/css/desktop/{{ Str::lower(Route::currentRouteName()) }}.css" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://classbet97x.space/idn/assets/js/desktop/script.js" as="script">
    <link rel="preload" href="https://classbet97x.space/idn/assets/js/desktop/{{ auth()->check() ? 'auth' : 'guest' }}/{{ Str::lower(Route::currentRouteName()) }}.js" as="script">
    <link rel="stylesheet" href="https://classbet97x.space/assets/css/fontawesome/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/css/desktop/style.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/css/desktop/{{ Str::lower(Route::currentRouteName()) }}.css" crossorigin="anonymous">
    <style>.header-cover {background-image:url(/storage/{{ config('app.desktop_logo') }});background-repeat:no-repeat;background-position:15px 5px}</style>
</head>

<body class="content-body">
    <div class="fixed-top">
        <x-desktop.fixed-top.header />
        <x-desktop.fixed-top.navbar />
    </div>

    <x-desktop.partials.running-text />
    <x-desktop.partials.breadcrumb :show="Route::currentRouteName() != 'home' ? true : false">
        <div class="breadcrumb">
            <ol>
                <li>
                    <a href="{{ config('app.url') }}">Beranda</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>{{ Str::title(Route::currentRouteName()) }}</li>
            </ol>
        </div>
    </x-desktop.partials.breadcrumb>

    <div class="main">
        {{ $slot }}
    </div>

    <x-desktop.modal.error />
    <x-desktop.modal.login />
    <x-desktop.modal.validation-error />
    <x-desktop.modal.bonus-dialog />
    <x-desktop.modal.level-up-notification />
    <x-desktop.modal.failed-withdraw-notification />
    <x-desktop.modal.time-limit-notification />
    <x-desktop.modal.calibrating-process />
    <x-desktop.modal.game-launch />
    <x-desktop.modal.incomplete-game />
    <x-desktop.partials.roll-to />
    <x-desktop.partials.hamburger-menu />
    <x-desktop.bottom.footer />

    <script src="https://classbet97x.space/idn/assets/js/desktop/script.js"></script>
    <script src="https://classbet97x.space/idn/assets/js/desktop/{{ auth()->check() ? 'auth' : 'guest' }}/{{ Str::lower(Route::currentRouteName()) }}.js"></script>
    @if (\App\Models\Contact::first()->livechat)<script>$(document).ready(function(){var tawkSrc="https://embed.tawk.to/{{ \App\Models\Contact::first()->livechat }}";window.Tawk_API=window.Tawk_API||{};window.Tawk_LoadStart=new Date;var $tawkScript=$("<script>",{async:true,src:tawkSrc,charset:"UTF-8",crossorigin:"*"});$("script").first().before($tawkScript)});</script>@endif
</body>

</html>
