@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-image" style="background-image:url(../assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
            <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="header">
                        <div class="logo-container">
                            <img src="http://www.consultoriagastronomica.com.br/wp-content/uploads/2019/11/bem-estar-png.png" width="30" alt="Oreo">

                        </div>
                        <h5>Esqueceu sua senha?</h5>
                        <span>Insira seu E-mail abaixo.</span>
                    </div>
                    <div class="content">
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <div class="input-group input-lg">
                            <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            


                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block waves-effect waves-light">
                            {{ __('Resetar Senha') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection