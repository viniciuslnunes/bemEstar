@extends('layouts.master')
@section('title', 'Bem estar - Lista de atendimento')
@section('content')
<table class="table table-striped table-bordered">
@if (Session::has('success'))
        <div class="contact-form-success alert alert-success mt-4">
            {{ Session::get('success') }}
        </div>
    @endif
    <!-- <img src="{{asset('storage/img-avaliacoes/daniel.PNG')}}" alt=""> -->

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
        @foreach($avaliacoes as $cliente)
        <tr>
            <td>{{$cliente->nome_empresa}}</td>
            <td>{{$cliente->nome_responsavel}}</td>
            <td>{{$cliente->nome_formulario}}</td>
            <td>{{date('d/m/Y', strtotime($cliente->data_inicio))}}</td>
            <td>{{$cliente->status}}</td>
            <td>
            <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                    <a href="{{ route('clientes.show', $cliente->id)}}" class="btn btn-primary btn-sm">Detalhes</a>
                    <a href="{{ route('clientes.edit', $cliente->id)}}" class="btn btn-primary btn-sm">Editar</a>
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

