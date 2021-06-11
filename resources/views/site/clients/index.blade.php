@extends('layouts.master')
@section('title', 'Bem estar - Lista de atendimento')
@section('content')
<table class="table table-striped table-bordered">

<!-- LISTA DE ATENDIMENTOS -->

    <thead class="thead-dark">
        <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Avaliado por</th>
            <th scope="col">Formulario</th>
            <th scope="col">Data</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
            <th scope="col">Relatórios</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->nome_empresa}}</td>
            <td>{{$cliente->nome_responsavel}}</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>
            <form action="{{ route('site.clientes.destroy', $cliente->id)}}" method="post">
                    <a href="{{ route('site.clientes.show', $cliente->id)}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('site.clientes.edit', $cliente->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
            </td>
            <td>#</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

