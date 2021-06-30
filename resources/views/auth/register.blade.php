@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="page-header-image" style="background-image:url(../assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="header">
                        <div class="logo-container">
                            <img src="http://www.consultoriagastronomica.com.br/wp-content/uploads/2019/11/bem-estar-png.png" width="30" alt="Oreo">
                        </div>
                        <h5>Criar Conta</h5>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input id="name" type="text" placeholder="Nome Completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input id="email" type="email" placeholder="Endereço de E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input id="password-confirm" type="password" placeholder="Confirmar Senha" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-round btn-lg btn-block waves-effect waves-light" type="submit" class="btn btn-primary">
                            {{ __('Criar Conta') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection