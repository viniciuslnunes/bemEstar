@extends('layouts.master')
@section('title', 'Bem estar - Criar cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Adicionar cliente
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

        <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
            <div class="row">
                <div class="col">
                
                    <label for="nome_fantasia">Nome da empresa:</label>
                    <input type="text" class="form-control" name="nome_empresa" />
                </div>
                <div class="col">
                    <label for="cpf">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="user">Nome do responsável:</label>
                    <input type="text" class="form-control" name="nome_responsavel" />
                </div>
                <div class="col">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" />
                </div>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" name="celular" />
            </div>
            <button type="submit" class="btn btn-primary">Adicionar cliente</button>
        </form>
    </div>
</div>
@endsection