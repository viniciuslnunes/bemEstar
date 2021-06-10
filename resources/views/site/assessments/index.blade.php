@extends('layouts.master')
@section('content')
<table class="table table-striped table-bordered">

<!-- LISTA DE ATENDIMENTOS -->

    <thead class="thead-dark">
        <tr>
            <th scope="col">ID.</th>
            <th scope="col">Avaliação</th>
            <th scope="col">Item</th>
            <th scope="col">Ações</th>
  
        </tr>
    </thead>
    <tbody>
        @foreach($assessments as $assessment)
        <tr>
            <td>1</td>
            <td>Arnaldo Lafuente</td>
            <td>avaliacao</td>
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

