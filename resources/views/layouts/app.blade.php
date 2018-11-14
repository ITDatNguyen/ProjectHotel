<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DTDL | hotel-Booking</title>
    <link href="{{URL::asset('/img/img/logo.png')}}" />
    <style>
        header {
            position: fixed;
            z-index: 200;
            background: white
        }

        #right-aboutHotel,
        .ws_images {
            margin-top: 62px
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: rgb(220, 30, 40);
            color: white;
            cursor: pointer;
            padding: 6px;
            border-radius: 4px;
            font-size: 16px;
        }

        #myBtn:hover {
            background-color: #555;
        }
    </style>
    @yield('charts')
    <script>
        
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
            </script>
</head>

<body style="background-color: #e6eaed!important;font-family: MuseoSans,sans-serif;">
    @yield('css')
    @include('layouts.head')
    @include('layouts.header') 
    @yield('content')
    @include('layouts.footer')
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>

</html>