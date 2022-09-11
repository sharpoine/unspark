<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agen | Bootstrap Agency Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontDist/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('frontDist/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('frontDist/plugins/themify-icons/themify-icons.css') }}">
    <!-- venobox css -->
    <link rel="stylesheet" href="{{ asset('frontDist/plugins/venobox/venobox.css') }}">
    <!-- card slider -->
    <link rel="stylesheet" href="{{ asset('frontDist/plugins/card-slider/css/style.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('frontDist/css/style.css') }}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    @include('front.layouts.header')

    @yield('content')

    @include('front.layouts.footer')
    <!-- jQuery -->
    <script src="{{asset('frontDist/plugins/jQuery/jquery.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('frontDist/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- slick slider -->
    <script src="{{asset('frontDist/plugins/slick/slick.min.js')}}"></script>
    <!-- venobox -->
    <script src="{{asset('frontDist/plugins/venobox/venobox.min.js')}}"></script>
    <!-- shuffle -->
    <script src="{{asset('frontDist/plugins/shuffle/shuffle.min.js')}}"></script>
    <!-- apear js -->
    <script src="{{asset('frontDist/plugins/counto/apear.js')}}"></script>
    <!-- counter -->
    <script src="{{asset('frontDist/plugins/counto/counTo.js')}}"></script>
    <!-- card slider -->
    <script src="{{asset('frontDist/plugins/card-slider/js/card-slider-min.js')}}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
    </script>
    <script src="{{asset('frontDist/plugins/google-map/gmap.js')}}"></script>

    <!-- Main Script -->
    <script src="{{asset('frontDist/js/script.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('scripts')
</body>

</html>
