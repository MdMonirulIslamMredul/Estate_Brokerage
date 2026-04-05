<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<meta name="description" content="Real Estate Bootstrap 5 Landing Template" />
<meta name="keywords"
    content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Real Estate, buy, sell, Rent" />
<meta name="author" content="Shreethemes" />
<meta name="website" content="https://shreethemes.in/" />
<meta name="email" content="support@shreethemes.in" />
<meta name="version" content="1.0.0" />
<!-- favicon -->
<link href="{{ secure_asset(App\Models\Logo::latest()->first()->favicon_image) }}" rel="shortcut icon">
<!-- Bootstrap core CSS -->
<link href="{{ secure_asset('frontend/assets/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" />
<!-- Slider -->
<link href="{{ secure_asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet" />
<!-- Slider -->
<link href="{{ secure_asset('frontend/assets/css/tiny-slider.css') }}" rel="stylesheet" />
<!-- Tobii -->
<link href="{{ secure_asset('frontend/assets/css/tobii.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Choice css -->
<link href="{{ secure_asset('frontend/assets/css/choices.min.css') }}" rel="stylesheet" />
<!--Material Icon -->
<link href="{{ secure_asset('frontend/assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Custom  Css -->
<link href="{{ secure_asset('frontend/assets/css/style.min.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
<!-- Modern Design CSS -->
<link href="{{ secure_asset('frontend/assets/css/modern-design.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ secure_asset('frontend/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
<!-- Header styles (moved from inline) -->
<link href="{{ secure_asset('frontend/assets/css/header.css') }}" rel="stylesheet" type="text/css" />
{{-- fontasesome cdn --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- bootstrap icons cdn --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
{{-- toastr css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
