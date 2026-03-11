<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ $metaTitle ?? 'LinkAura' }}</title>

        <meta name="description" content="{{ $metaDescription ?? 'LinkAura Digital Platform' }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $metaTitle ?? 'LinkAura' }}">
        <meta property="og:description" content="{{ $metaDescription ?? 'LinkAura Digital Platform' }}">
        <meta property="og:image" content="{{ $metaImage ?? asset('default-share-image.png') }}">
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