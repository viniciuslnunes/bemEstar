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
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('css/color_skins.css')}}">

</head>

<body class="authentication sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-collapse">
                @if (Route::has('register'))
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-white btn-round" href="{{ route('register') }}">{{ __('Criar Conta') }}</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-color:white !important"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="header">
                            <div class="logo-container">
                                <img src="http://www.consultoriagastronomica.com.br/wp-content/uploads/2019/11/bem-estar-png.png" width="30" alt="Oreo">
                            </div>
                            <h5>Acessar</h5>
                        </div>
                        <div class="content">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group input-lg">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-account-circle"></i>
                                </span>
                            </div>
                            <div class="input-group input-lg">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-lock"></i>
                                </span>
                            </div>
                            <div class="form-group row flex-center" style="margin-left: 70px;">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Manter conectado') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button> @if (Route::has('password.request'))
                            <a class="btn btn-link" style="color: white;" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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