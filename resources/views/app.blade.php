<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ $page['props']['metaTitle'] ?? 'LinkAura' }}</title>

        <meta name="description" content="{{ $page['props']['metaDescription'] ?? 'LinkAura Digital Platform' }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $page['props']['metaTitle'] ?? 'LinkAura' }}">
        <meta property="og:description" content="{{ $page['props']['metaDescription'] ?? 'LinkAura Digital Platform' }}">
        {{-- <meta property="og:image" content="{{ $page['props']['metaImage'] ?? asset('images/linkAuraLogo.png') }}"> --}}
        <meta property="og:image" content="{{ url('images/linkAuraLogo1200.png') }}">
        <meta property="og:image:secure_url" content="{{ url('images/linkAuraLogo1200.png') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:url" content="{{ url()->current() }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @routes
        @vite(['resources/css/app.css', 'resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>