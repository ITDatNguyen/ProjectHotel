<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title >DTDL | hotel-Booking</title>
    <link href="{{URL::asset('/img/img/logo.png')}}" />
    <style>
        header{
            position: fixed;
            z-index: 200;
            background: white
        }
        #right-aboutHotel, .ws_images
        {
            margin-top: 62px
        }
    </style>
    @yield('charts')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body style="background-color: #e6eaed!important;
    font-family: MuseoSans,sans-serif;
">
    @yield('css')
    @include('layouts.head')
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
