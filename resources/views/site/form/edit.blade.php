@extends('layouts.master')
@section('title', 'Bem estar - Editar Formulário')
@section('subtitle','Editar Formulário')


@section('content')
<div class="card">
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('formularios.update', $forms->id) }}">
            <div class="row">
                <div class="col">
                    @csrf
                    @method('PATCH')
                    <label for="cnpj">Nome do formulário:</label>
                    <input type="text" class="form-control" name="nome_formulario" value="{{ $forms->nome_formulario }}" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    @foreach($forms->questForm as $quest)
                    <div class="form-group">
                        <label for="{{$quest->id}}">Questão {{$loop->index+1}}:</label>
                        <input type="text" class="form-control" name="{{ 'quests[' . $quest->id . ']' }}" value="{{ $quest->quest }}">
                    </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>
</div>
@endsection