@extends('layouts.master')
@section('title', 'Bem estar - Lista de atendimento')
@section('content')


<table class="table table-striped table-bordered">
@if (Session::has('success'))
        <div class="contact-form-success alert alert-success mt-4">
            {{ Session::get('success') }}
        </div>
    @endif

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
            <td>{{$cliente->cnpj}}</td>
            <td>{{$cliente->nome_responsavel}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->celular}}</td>
            <td>
            <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                    <a href="{{ route('clientes.show', $cliente->id)}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('clientes.edit', $cliente->id)}}" class="btn btn-primary btn-sm">Editar</a>
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

