<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- 🔥 TITLE -->
    <meta property="og:title" content="{{ $website_data->company_name }}" />

    <!-- 🔥 DESCRIPTION -->
    <meta property="og:description" content="Check out our business profile!" />

    <!-- 🔥 IMAGE (VERY IMPORTANT) -->
    <meta property="og:image" content="{{ 
        $website_data->logo_path 
        ? asset('storage/company_logos/' . $website_data->logo_path) 
        : asset('default-logo.png') 
    }}" />

    <!-- 🔥 URL -->
    <meta property="og:url" content="{{ url()->current() }}" />

    <meta property="og:type" content="website" />

</head>
<body>

@php
$slug = strtolower(preg_replace('/[^a-z0-9\s]/', '', $website_data->company_name));
$slug = str_replace(' ', '', $slug);
@endphp

<h2>Loading...</h2>

<script>
    // 🔥 user click pannina redirect
    setTimeout(() => {
    window.location.href = "/slug/Website_Temp_xxx";
}, 1000);
</script>

</body>
</html>