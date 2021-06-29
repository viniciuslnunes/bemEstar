<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="{{ asset('js/form.js') }}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Custom Css -->
    <style>
        #features li,
        #documenter_cover li,
        #template li {
            padding: 5px 0;
        }

        .sidebar .menu .list a {
            padding: 10px !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/color_skins.css')}}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> -->

    <title>@yield('title')</title>
    @yield('script_head')

</head>

<body class="theme-green">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="http://www.consultoriagastronomica.com.br/wp-content/uploads/2019/11/bem-estar-png.png" width="48" height="48" alt="Oreo"></div>
            <p>Carregando...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Top Bar -->
    <nav class="navbar p-l-5 p-r-5">
        <ul class="nav navbar-nav navbar-left" style="
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
">
            <li>
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="{{ route('clientes.index') }}"><img src="http://www.consultoriagastronomica.com.br/wp-content/uploads/2019/11/bem-estar-png.png" width="30" alt="Oreo"><span class="m-l-10" style="font-weight: bold; text-shadow: 1px 2px 1px #000, 9px 0px 0px rgb(0 0 0 / 5%);"><span style="color:green">BEM</span><span style="color:orange">ESTAR</span></span></a>
                </div>
            </li>
            <li class="float-right">
                <a class="mega-menu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
            </li>
        </ul>
    </nav>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="tab-content">
            <div class="tab-pane stretchRight active" id="dashboard">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info">
                                <div class="detail" style="margin-top: 3rem;">
                                    <h4>Bem vindo(a), {{ auth()->user()->name ?? 'Convidado' }}</h4>
                                    <small>Consultoria Gastronômica</small>
                                </div>
                            </div>
                        </li>
                        <li class="header">MENU</li>
                        <li class="active open"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Clientes</span> </a>
                            <ul>
                                <li><a href="{{ route('clientes.index') }}">Lista de Clientes</a></li>
                                <li><a href="{{ route('clientes.create') }}">Cadastrar Cliente</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label-alt"></i><span>Formulários</span> </a>
                            <ul class="ml-menu">
                                <li> <a class="nav-link" href="{{ route('formularios.index') }}">Lista de Formulários</a></li>
                                <li> <a class="nav-link" href="{{ route('formularios.create') }}">Cadastrar Formulário</a></li>

                            </ul>
                        </li>
                        <li> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><i class="zmdi zmdi-folder"></i><span>Atendimentos</span> </a>
                            <ul class="ml-menu">
                                <li><a class="nav-link" href="{{ route('avaliacoes.index') }}">Lista de Atendimento</a></li>
                                <li><a class="nav-link" href="{{ route('avaliacoes.create') }}">Nova Atendimento</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <div class="tab-content">
            <div class="tab-pane slideRight active" id="setting">
                <div class="slim_scroll">
                    <div class="card">
                        <h6>Skins</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="green" class="active">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                        </ul>
                    </div>
                    <div class="card theme-light-dark">
                        <h6>Left Menu</h6>
                        <button class="t-light btn btn-default btn-simple btn-round btn-block">Light</button>
                        <button class="t-dark btn btn-default btn-round btn-block">Dark</button>
                    </div>
                </div>
            </div>
        </div>

    </aside>

    <!-- main content -->
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sistema Bem Estar</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12 ">
                    <div class="card" id="documenter_cover">
                        <div class="header">
                        <h2>@yield('subtitle')</h2>
                        </div>
                        <div class="body">
                            <section class="">
                                @yield('content')
                            </section>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('js/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v2.1.4.js ) -->
    <script src="{{asset('js/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{asset('js/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
    <script src="{{asset('js/index.js')}}"></script>

    <script>
        $('#leftsidebar .list li').click(function() {
            var $this = $(this);
            if (!$this.is('active open')) {
                $('#leftsidebar .list li').removeClass('active open').removeData("top");
                $this.addClass('active open').data("top", $this.offset().top);
            }
        });
        document.createElement('section');
        var duration = '500',
            easing = 'swing';
    </script>
</body>

</html>