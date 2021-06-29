@extends('layouts.master')
@section('title', 'Bem estar - Cadastrar Cliente')
@section('subtitle','Cadastrar Cliente')


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

        <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
            <div class="row">
                <div class="col">
                
                    <label for="nome_fantasia">Nome da empresa:</label>
                    <input type="text" class="form-control" name="nome_empresa" value="{{ old('nome_empresa') }}" />
                </div>
                <div class="col">
                    <label for="cpf">CNPJ:</label>
                    <input type="text" id="cnpj" class="form-control" name="cnpj" value="{{ old('cnpj') }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="user">Nome do responsável:</label>
                    <input type="text" class="form-control" name="nome_responsavel" value="{{ old('nome_responsavel') }}" />
                </div>
                <div class="col">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" id="celular" class="form-control" name="celular" value="{{ old('celular') }}" />
            </div>
            <button type="submit" class="btn btn-primary">Adicionar cliente</button>
        </form>
    </div>
</div>
<script type="text/javascript">
$("#celular").mask("(00) 90000-0000");
$("#cnpj").mask("00.000.000/0000-00");
</script>

@endsection