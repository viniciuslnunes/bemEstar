@extends('layout')
@section('cabecalho')
            <h1>Adicionar Série</h1>
        @endsection
@section('conteudo')
                <form method="post">
                <div class="form-group">
                <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">

                </div>
                <button class="btn btn-primary">Adicionar</button>
                </form>
@endsection