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

    <title>@yield('title')</title>
    @yield('script_head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-dark text-white shadow-sm">
        <li class="navbar navbar-expand-md navbar-light bg-dark text-white shadow-sm nav-item dropdown">
                                <a id="navbarDropdown" style="color:white"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  Bem vindo(a), {{ auth()->user()->name ?? 'Convidado' }}
                                
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.create') }}">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('formularios.index') }}">Formulários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('formularios.create') }}">Novo Formulário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('avaliacoes.index') }}">Avaliações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('avaliacoes.create') }}">Nova Avaliação</a>
                </li>
                <form id="logout-form" action="{{ route('clientes.index') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>


</body>

</html>