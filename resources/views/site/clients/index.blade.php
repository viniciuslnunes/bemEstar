@extends('layouts.master')
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
''        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->razao_social}}</td>
            <td>{{$cliente->nome_fantasia}}</td>
            <td>{{$cliente->nome_responsavel}}</td>
            <td>
                <form action="{{ route('site.clientes')}}" method="post">
                    <a href="{{ route('site.clientes')}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('site.clientes')}}" class="btn btn-primary btn-sm">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

