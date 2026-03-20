<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $website_data->company_name }}</title>

    <meta property="og:title" content="{{ $website_data->company_name }}" />
    <meta property="og:description" content="View our professional profile on LinkAura." />

    <meta property="og:image" content="{{ 
        $website_data->logo_path 
        ? asset('storage/company_logos/' . $website_data->logo_path) 
        : asset('default-logo.png') 
    }}" />

    <meta property="og:url" content="{{ url('/share/'.$website_data->company_name.'/'.base64_encode($website_data->id)) }}" />
    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="summary_large_image">

</head>
<body>

    <!-- Redirect to actual page -->
    <script>
        window.location.href = "{{ url('/'.$website_data->company_name.'/Website_Temp_'.base64_encode($website_data->id)) }}";
    </script>

</body>
</html>