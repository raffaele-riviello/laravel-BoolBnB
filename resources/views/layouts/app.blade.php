<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    {{-- <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.57.0/maps/maps-web.min.js'></script> --}}
    <script src="[ckeditor-build-path]/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/80a8b5f4b8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" charset="utf-8"></script>
    <!-- TOMTOM -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.37.2/maps/maps.css'/>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.37.2/maps/maps-web.min.js'></script>
    <!-- TOMTOM -->

    <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    @yield('style')
    @yield('bootstrap')
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
  <div class="loader-container">
      <div class="loader"></div>
  </div>
  {{-- <div id="app"> --}}
    @yield('header')

        <main class="py-4">
            @yield('main')
        </main>

        @yield('footer')

        @yield('svg')

        {{-- PRELOADER --}}


        <script>
            $(window).on("load",function(){
                $(".loader-container").fadeOut(2000);
            });
        </script>
        {{-- PRELOADER --}}
    {{-- </div> --}}
</body>
</html>
