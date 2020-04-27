<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>@yield('title') Nak News - Nankurunaisa</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/051b553a10.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('shared.preloader')
    @include('shared.header')
    @yield('content')
    @include('shared.footer')
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
</body>
</html>