<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $website_data->company_name }}</title>
    <meta property="og:title" content="{{ $website_data->company_name }}" />
    <meta property="og:description" content="View our professional profile on LinkAura." />
    <meta property="og:image" content="{{ $website_data->logo_path ?? asset('default-logo.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    @vite(['resources/css/app.css', 'resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead 
</head>
<body>
    @inertia 
</body>
</html>