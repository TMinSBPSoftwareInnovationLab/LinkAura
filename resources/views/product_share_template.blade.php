<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- 🔥 PRODUCT OG -->
    <meta property="og:title" content="{{ $product->product_name }}" />

    <meta property="og:description" content="Check out this product!" />

    <meta property="og:image" content="{{ 
        $product->product_img 
        ? 'https://linkaura-product-images.s3.amazonaws.com/product_images/' . $product->product_img 
        : asset('default-product.png') 
    }}" />

    <meta property="og:url" content="{{ url()->current() }}" />

    <meta property="og:type" content="website" />

    <title>{{ $product->product_name }}</title>
</head>

<body>

<h3>Redirecting...</h3>

<script>
    setTimeout(() => {
        window.location.href = "{{ $final_url }}";
    }, 1000);
</script>

</body>
</html>