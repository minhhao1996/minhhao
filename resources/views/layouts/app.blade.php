<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta charset="UTF-8"/>
    <title>C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME</title>
    <meta name="description"/>
    <meta name="keywords"/>
    <link href="../website/img/favicon.png" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME" property="og:title"/>

    <!--------------CSS----------->

    <link rel="stylesheet" href="{{ asset('font-end/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/css/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/css/view.css') }}">
    <link rel="stylesheet" href="{{ asset('font-end/css/rebonsi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
    <script src="{{ asset('font-end/js/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=2488139114537079&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</head>



<body class="home option2">
<div class="wrapper ">

    @include('layouts.header')


        @yield('content')



    @include('layouts.footer')
</div>
<script src="{{asset('font-end/js/bootstrap/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="{{asset('font-end/js/owl.carousel/owl.carousel.js')}}"></script>
<script src="{{asset('font-end/js/swiper/swiper.min.js')}}"></script>
<script src="{{asset('font-end/js/main.js')}}"></script>

</body>


</html>
