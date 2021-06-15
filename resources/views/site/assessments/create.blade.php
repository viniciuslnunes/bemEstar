@extends('layouts.master')
@section('title','Adicionar proposta')

@section('content')
<div class="card">
    <div class="card-header bg-dark">
        Adicionar avaliação
    </div>
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

        <form method="post" action="{{ route('site.formularios.store') }}">
            <div class="row">
                <div class="col">
                    @csrf
                    <label for="cliente_id">Cliente:</label>
                    <select class="custom-select" name="cliente_id">
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nome_empresa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="form_id">Formulário:</label>
                    <select class="custom-select" name="form_id">
                        @foreach($forms as $form)
                        <option value="{{$form->id}}">{{$form->nome_formulario}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="data_parcelas">Data:</label>
                    <input type="date" class="form-control" name="data_parcelas" />
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center">

            <b>Itens do formulário</b>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <div class="col" style="display: flex; justify-content: center;">
                    <ol style="padding: 0;">
                        @foreach($quests as $quest)
                        <li value="{{$quest->id}}">{{$quest->quest}}</li>
                        @endforeach
                        <ol>
                </div>
            </div>

            <br>
            <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-4">Salvar e sair </button>
            <button type="submit" class="btn btn-primary">Salvar e continuar</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val();
        $(this).next('.form-control-file').html(fileName);
    })
</script>
@endsection