@extends('layouts.master')
@section('title', 'Bem estar - Lista de atendimento')
@section('content')


<table class="table table-striped table-bordered">

    <thead class="thead-dark">
        <tr>
            <th scope="col">Cliente</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Nome do responsável</th>
            <th scope="col">E-mail</th>
            <th scope="col">Celular</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->nome_empresa}}</td>
            <td id="cnpj">{{$cliente->cnpj}}</td>
            <td>{{$cliente->nome_responsavel}}</td>
            <td>{{$cliente->email}}</td>
            <td id="celular">{{$cliente->celular}}</td>
            <td>
            <form action="{{ route('site.clientes.destroy', $cliente->id)}}" method="post">
                    <a href="{{ route('site.clientes.show', $cliente->id)}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('site.clientes.edit', $cliente->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
$("#celular").mask("(00) 90000-0000");
$("#cnpj").mask("000.000.000-00");
</script>

@endsection

