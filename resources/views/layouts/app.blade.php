<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Bem Estar - Login</title>
    <!-- Favicon  -->
    <link rel="shortcut icon" type="imagem/x-icon" href="https://marcasiteteste.com.br/bem-estar/images/icon.png">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('css/color_skins.css')}}">

</head>

<body class="authentication sidebar-collapse off">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-collapse">
                @if (Route::has('register'))
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link btn btn-white btn-round" href="{{ route('login') }}">{{ __('LOGAR') }}</a>
                    </li>
                    
                </ul>
                @endif
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    @yield('content')

    
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script>
        $(".navbar-toggler").on('click', function() {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function() {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function() {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>
</body>

</html>