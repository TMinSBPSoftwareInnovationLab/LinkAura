<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta property="og:title" content="{{ $website_data->company_name }}" />
    <meta property="og:description" content="View our professional profile on LinkAura." />

    <meta property="og:image" content="{{ 
        $website_data->logo_path 
        ? asset('storage/company_logos/' . $website_data->logo_path) 
        : asset('default-logo.png') 
    }}" />

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

</head>
<body>

<h2>Loading...</h2>

<script>
    // 👇 AFTER OG load, redirect pannalam
    setTimeout(() => {
        window.location.href = "{{ url('/'.$website_data->company_name.'/Website_Temp_'.base64_encode($website_data->id)) }}";
    }, 1000);
</script>

</body>
</html>