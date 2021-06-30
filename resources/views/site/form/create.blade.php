@extends('layouts.master')
@section('title', 'Bem estar - Cadastrar Formulário')
@section('subtitle','Cadastrar Formulário')
@section('script_head')
@endsection
@section('content')
<div class="card">
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

        <form method="POST" action="{{ route('formularios.store') }}">
            @csrf
            <div class="row">
                <div class="col">

                    <label for="nome_formulario">Nome do formulário</label>
                    <input type="text" class="form-control" name="nome_formulario" value="{{ old('nome_formulario') }}">

                </div>

            </div>
            <div class="inputs mb-4">
                <label for="">Insira uma questão</label>
                <div id="container-inputs">
                    <input type="text" id="input_quest" class="form-control" />
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