<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $website_data->company_name }}</title>

    <!-- optional OG -->
    <meta property="og:title" content="{{ $website_data->company_name }}" />
</head>
<body>

    <div id="app"></div>

    @vite('resources/js/app.js')

</body>
</html>