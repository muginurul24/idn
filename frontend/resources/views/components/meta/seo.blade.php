<meta name="title" content="{{ config('app.name') . ' | ' . config('app.title') }}">
<meta name="description" content="{{ config('app.description') }}">
<meta name="keywords" content="{{ config('app.keyword') }}">
<meta name="author" content="{{ config('app.name') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ config('app.name') . ' | ' . config('app.title') }}">
<meta property="og:description" content="{{ config('app.description') }}">
<meta property="og:image" content="/storage/{{ config('app.card_image') }}">
<meta property="og:site_name" content="{{ config('app.name') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ config('app.name') . ' | ' . config('app.title') }}">
<meta property="twitter:description" content="{{ config('app.description') }}">
<meta property="twitter:image" content="/storage/{{ config('app.card_image') }}">

<!-- Sitemap control -->
<link rel="sitemap" type="application/xml" title="Sitemap" href="{{ route('sitemap') }}">

<!-- Robots control -->
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
