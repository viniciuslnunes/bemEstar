@extends('layouts.master')
@section('title', 'Bem estar - Criação de formulario')
@section('script_head')
<script src="{{ asset('js/form.js') }}" type="text/javascript"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Adicionar formulário
    </div>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('site.formularios.store') }}">
            @csrf
            <div class="row">
                <div class="col">

                    <label for="nome_formulario">Nome do formulário</label>
                    <input type="text" name="nome_formulario">

                </div>

                <!-- ADICIONAR USER COMO CRIADOR DO FORM -->

                <!-- <div class="col">
                    <label for="cpf">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" />
                </div> -->
            </div>
            <div class="inputs">
                <label for="">questões</label>
                <div id="container-inputs">
                    <input type="text" id="input_quest" />
                </div>
            </div>
            <div class="d-flex flex-nowrap">
                <button type="submit" class="btn btn-primary mr-4">Adicionar formulário</button>
                <button type="button" class="btn btn-primary" onclick="createInput()">Criar questão</button>
            </div>
        </form>
    </div>
</div>
@endsection