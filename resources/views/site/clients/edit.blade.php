@extends('layouts.master')
@section('title', 'Bem estar - Editar cliente')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Update Shows
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

        <form method="post" action="{{ route('site.clientes.update', $clientes->id) }}">
            <div class="row">
                <div class="col">
                    @csrf
                    @method('PATCH')
                    <label for="nome_empresa">Nome Fantasia:</label>
                    <input type="text" class="form-control" name="nome_empresa"
                        value="{{ $clientes->nome_empresa }}" />   </div>
                <div class="col">
                <label for="cnpj">CNPJ:</label>
                    <input type="text" class="form-control" name="cnpj" value="{{ $clientes->cnpj }}" />
             
                    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="nome_responsavel">Responsável:</label>
                    <input type="text" class="form-control" name="nome_responsavel"
                        value="{{ $cliente->nome_responsavel }}" />
                </div>
                <div class="col">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $cliente->email }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" name="celular" value="{{ $clientes->celular }}" />
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection