<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
    <link rel="preload" href="https://classbet97x.space/idn/assets/css/mobile/style.css" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://classbet97x.space/idn/assets/css/mobile/{{ Str::lower(Route::currentRouteName()) }}.css" as="style" crossorigin="anonymous">
    <link rel="preload" href="https://classbet97x.space/idn/assets/js/mobile/script.js" as="script">
    <link rel="preload" href="https://classbet97x.space/idn/assets/js/mobile/{{ auth()->check() ? 'auth' : 'guest' }}/{{ Str::lower(Route::currentRouteName()) }}.js" as="script">
    <link rel="stylesheet" href="https://classbet97x.space/assets/css/fontawesome/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/css/mobile/style.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://classbet97x.space/idn/assets/css/mobile/{{ Str::lower(Route::currentRouteName()) }}.css" crossorigin="anonymous">
</head>

<body>
    <div id="wrapper">
        <x-mobile.partials.spinner-loading />
        <x-mobile.partials.sidebar />
        <div id="page-content-wrapper">
            <x-mobile.partials.header />
            <x-mobile.partials.running-text />
            {{ $slot }}
        </div>
    </div>
    <x-mobile.modals.banner-home />
    <x-mobile.modals.login />
    <x-mobile.footer />
    <script src="https://classbet97x.space/idn/assets/js/mobile/script.js"></script>
    @stack('scripts')
    <script src="https://classbet97x.space/idn/assets/js/mobile/{{ auth()->check() ? 'auth' : 'guest' }}/{{ Str::lower(Route::currentRouteName()) }}.js"></script>
    @if (\App\Models\Contact::first()->livechat)<script>$(document).ready(function(){var tawkSrc="https://embed.tawk.to/{{ \App\Models\Contact::first()->livechat }}";window.Tawk_API=window.Tawk_API||{};window.Tawk_LoadStart=new Date;var $tawkScript=$("<script>",{async:true,src:tawkSrc,charset:"UTF-8",crossorigin:"*"});$("script").first().before($tawkScript)});</script>@endif
</body>

</html>
