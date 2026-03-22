<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- ✅ TITLE -->
    <meta property="og:title" content="{{ $website_data->company_name }}" />

    <!-- ✅ DESCRIPTION -->
    <meta property="og:description" content="Check out our business profile!" />

    <!-- ✅ IMAGE -->
    <meta property="og:image" content="{{ 
        $website_data->logo_path 
        ? 'https://linkaura-company-logos.s3.us-east-1.amazonaws.com/company_logos/' . $website_data->logo_path 
        : asset('default-logo.png') 
    }}" />

    <!-- ✅ URL -->
    <meta property="og:url" content="{{ url()->current() }}" />

    <meta property="og:type" content="website" />

    <title>{{ $website_data->company_name }}</title>
</head>

<body>

@php
    $slug = strtolower(preg_replace('/[^a-z0-9\s]/', '', $website_data->company_name));
    $slug = str_replace(' ', '', $slug);

    $encoded = base64_encode($website_data->website_id);
@endphp

<h3>Redirecting...</h3>

<script>
    setTimeout(() => {
        window.location.href = "/{{ $slug }}/{{ $website_data->id }}/Website_Temp_{{ $encoded }}";
    }, 1000);
</script>

</body>
</html>