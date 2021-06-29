@extends('layouts.master')
@section('content')
@section('subtitle','Lista de Formulários')


<table class="table table-striped table-bordered">
    @if (Session::has('success'))
        <div class="contact-form-success alert alert-success mt-4">
            {{ Session::get('success') }}
        </div>
    @endif
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID.</th>
            <th scope="col">Formulario</th>
            <th scope="col">Ações</th>
  
        </tr>
    </thead>
    <tbody>
        @foreach($forms as $form)
        <tr>
            <td>{{$form->id}}</td>
            <td>{{$form->nome_formulario}}</td>
            <td>
                <form action="{{ route('formularios.destroy', $form->id)}}" method="post">
                <!-- Adicionar view de quests -->
                    <a href="{{ route('formularios.show', $form->id)}}" class="btn btn-primary btn-sm">Ver questões</a>
                    <a href="{{ route('formularios.edit', $form->id)}}" class="btn btn-primary btn-sm">Editar</a>
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

