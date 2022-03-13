<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ 'News Hub' }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ secure_asset('../assets/img/favicon.png') }}" rel="icon">
  <link href="{{ secure_asset('../assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ secure_asset('/assets/vendor/aos/aos.css') }}" />
  <link rel="stylesheet" href="{{ secure_asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ secure_asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" />
  <link rel="stylesheet" href="{{ secure_asset('/assets/vendor/glightbox/css/glightbox.min.css') }}" />
  <link rel="stylesheet" href="{{ secure_asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" />

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ secure_asset('/assets/css/style.css') }}" >

</head>

<body>
  @include('../navbar')
    @yield('content')
    @include('../footer')
   
</body>
<!-- Vendor JS Files -->
<script src="{{ secure_asset('assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ secure_asset('assets/js/main.js') }}"></script>

</html>