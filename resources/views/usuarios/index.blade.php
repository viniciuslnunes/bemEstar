@extends('layout')
@section('cabecalho')
            <h1>Séries</h1>
@endsection
@section('conteudo')
        <a href="/clientes/adicionar" class="btn btn-dark mb-3">Adicionar cliente</a>

        <ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item"><?= $serie; ?></li>
    @endforeach
</ul>
@endsection
