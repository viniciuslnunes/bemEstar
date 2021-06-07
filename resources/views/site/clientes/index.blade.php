@extends('layouts.site')
@section('header')
            <h1>Clientes</h1>
@endsection
@section('content')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
        <a href="/clientes/adicionar" class="btn btn-dark mb-3">Adicionar cliente</a>

        <ul class="list-group">
    @foreach($clientes as $cliente)
    <li class="list-group-item">
    {{$cliente->nome}}
    <form method="post" action="/clientes/{{$cliente->id}}">
    @csrf
            <button class="btn btn-danger">Excluir</button>
        </form>

    </li>
    @endforeach
</ul>
@endsection
